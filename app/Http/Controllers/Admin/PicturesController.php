<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPictureRequest;
use App\Http\Requests\StorePictureRequest;
use App\Http\Requests\UpdatePictureRequest;
use App\Page;
use App\Picture;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PicturesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pictures = Picture::with(['page', 'media'])->get();

        return view('admin.pictures.index', compact('pictures'));
    }

    public function create()
    {
        abort_if(Gate::denies('picture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pictures.create', compact('pages'));
    }

    public function store(StorePictureRequest $request)
    {
        $picture = Picture::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $picture->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $picture->id]);
        }

        return redirect()->route('admin.pictures.index');
    }

    public function edit(Picture $picture)
    {
        abort_if(Gate::denies('picture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $picture->load('page');

        return view('admin.pictures.edit', compact('pages', 'picture'));
    }

    public function update(UpdatePictureRequest $request, Picture $picture)
    {
        $picture->update($request->all());

        if (count($picture->images) > 0) {
            foreach ($picture->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $picture->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $picture->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.pictures.index');
    }

    public function show(Picture $picture)
    {
        abort_if(Gate::denies('picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $picture->load('page');

        return view('admin.pictures.show', compact('picture'));
    }

    public function destroy(Picture $picture)
    {
        abort_if(Gate::denies('picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $picture->delete();

        return back();
    }

    public function massDestroy(MassDestroyPictureRequest $request)
    {
        Picture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('picture_create') && Gate::denies('picture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Picture();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
