<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryContent;
use App\DirectorySubCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDirectoryContentRequest;
use App\Http\Requests\StoreDirectoryContentRequest;
use App\Http\Requests\UpdateDirectoryContentRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DirectoryContentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('directory_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryContents = DirectoryContent::with(['directorysubcategory'])->get();

        return view('admin.directoryContents.index', compact('directoryContents'));
    }

    public function create()
    {
        abort_if(Gate::denies('directory_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorysubcategories = DirectorySubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.directoryContents.create', compact('directorysubcategories'));
    }

    public function store(StoreDirectoryContentRequest $request)
    {
        $directoryContent = DirectoryContent::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $directoryContent->id]);
        }

        return redirect()->route('admin.directory-contents.index');
    }

    public function edit(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorysubcategories = DirectorySubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $directoryContent->load('directorysubcategory');

        return view('admin.directoryContents.edit', compact('directorysubcategories', 'directoryContent'));
    }

    public function update(UpdateDirectoryContentRequest $request, DirectoryContent $directoryContent)
    {
        $directoryContent->update($request->all());

        return redirect()->route('admin.directory-contents.index');
    }

    public function show(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryContent->load('directorysubcategory');

        return view('admin.directoryContents.show', compact('directoryContent'));
    }

    public function destroy(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectoryContentRequest $request)
    {
        DirectoryContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('directory_content_create') && Gate::denies('directory_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DirectoryContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
