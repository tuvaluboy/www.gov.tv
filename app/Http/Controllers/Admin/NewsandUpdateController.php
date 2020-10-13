<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewsandUpdateRequest;
use App\Http\Requests\StoreNewsandUpdateRequest;
use App\Http\Requests\UpdateNewsandUpdateRequest;
use App\NewsandUpdate;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NewsandUpdateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('newsand_update_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsandUpdates = NewsandUpdate::all();

        return view('admin.newsandUpdates.index', compact('newsandUpdates'));
    }

    public function create()
    {
        abort_if(Gate::denies('newsand_update_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.newsandUpdates.create', compact('authors'));
    }

    public function store(StoreNewsandUpdateRequest $request)
    {
        $newsandUpdate = NewsandUpdate::create($request->all());

        if ($request->input('file', false)) {
            $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($request->input('image', false)) {
            $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $newsandUpdate->id]);
        }

        return redirect()->route('admin.newsand-updates.index');
    }

    public function edit(NewsandUpdate $newsandUpdate)
    {
        abort_if(Gate::denies('newsand_update_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $newsandUpdate->load('author');

        return view('admin.newsandUpdates.edit', compact('authors', 'newsandUpdate'));
    }

    public function update(UpdateNewsandUpdateRequest $request, NewsandUpdate $newsandUpdate)
    {
        $newsandUpdate->update($request->all());

        if ($request->input('file', false)) {
            if (!$newsandUpdate->file || $request->input('file') !== $newsandUpdate->file->file_name) {
                if ($newsandUpdate->file) {
                    $newsandUpdate->file->delete();
                }

                $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($newsandUpdate->file) {
            $newsandUpdate->file->delete();
        }

        if ($request->input('image', false)) {
            if (!$newsandUpdate->image || $request->input('image') !== $newsandUpdate->image->file_name) {
                if ($newsandUpdate->image) {
                    $newsandUpdate->image->delete();
                }

                $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($newsandUpdate->image) {
            $newsandUpdate->image->delete();
        }

        return redirect()->route('admin.newsand-updates.index');
    }

    public function show(NewsandUpdate $newsandUpdate)
    {
        abort_if(Gate::denies('newsand_update_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsandUpdate->load('author');

        return view('admin.newsandUpdates.show', compact('newsandUpdate'));
    }

    public function destroy(NewsandUpdate $newsandUpdate)
    {
        abort_if(Gate::denies('newsand_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsandUpdate->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsandUpdateRequest $request)
    {
        NewsandUpdate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('newsand_update_create') && Gate::denies('newsand_update_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new NewsandUpdate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
