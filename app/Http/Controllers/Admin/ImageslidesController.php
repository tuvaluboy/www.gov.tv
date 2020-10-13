<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImageslideRequest;
use App\Http\Requests\StoreImageslideRequest;
use App\Http\Requests\UpdateImageslideRequest;
use App\Imageslide;
use App\Page;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ImageslidesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('imageslide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageslides = Imageslide::all();

        return view('admin.imageslides.index', compact('imageslides'));
    }

    public function create()
    {
        abort_if(Gate::denies('imageslide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.imageslides.create', compact('pages'));
    }

    public function store(StoreImageslideRequest $request)
    {
        $imageslide = Imageslide::create($request->all());

        if ($request->input('image', false)) {
            $imageslide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $imageslide->id]);
        }

        return redirect()->route('admin.imageslides.index');
    }

    public function edit(Imageslide $imageslide)
    {
        abort_if(Gate::denies('imageslide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $imageslide->load('page');

        return view('admin.imageslides.edit', compact('pages', 'imageslide'));
    }

    public function update(UpdateImageslideRequest $request, Imageslide $imageslide)
    {
        $imageslide->update($request->all());

        if ($request->input('image', false)) {
            if (!$imageslide->image || $request->input('image') !== $imageslide->image->file_name) {
                if ($imageslide->image) {
                    $imageslide->image->delete();
                }

                $imageslide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($imageslide->image) {
            $imageslide->image->delete();
        }

        return redirect()->route('admin.imageslides.index');
    }

    public function show(Imageslide $imageslide)
    {
        abort_if(Gate::denies('imageslide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageslide->load('page');

        return view('admin.imageslides.show', compact('imageslide'));
    }

    public function destroy(Imageslide $imageslide)
    {
        abort_if(Gate::denies('imageslide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageslide->delete();

        return back();
    }

    public function massDestroy(MassDestroyImageslideRequest $request)
    {
        Imageslide::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('imageslide_create') && Gate::denies('imageslide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Imageslide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
