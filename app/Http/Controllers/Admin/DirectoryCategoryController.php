<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDirectoryCategoryRequest;
use App\Http\Requests\StoreDirectoryCategoryRequest;
use App\Http\Requests\UpdateDirectoryCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DirectoryCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('directory_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryCategories = DirectoryCategory::with(['media'])->get();

        return view('admin.directoryCategories.index', compact('directoryCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('directory_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directoryCategories.create');
    }

    public function store(StoreDirectoryCategoryRequest $request)
    {
        $directoryCategory = DirectoryCategory::create($request->all());

        if ($request->input('image', false)) {
            $directoryCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $directoryCategory->id]);
        }

        return redirect()->route('admin.directory-categories.index');
    }

    public function edit(DirectoryCategory $directoryCategory)
    {
        abort_if(Gate::denies('directory_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.directoryCategories.edit', compact('directoryCategory'));
    }

    public function update(UpdateDirectoryCategoryRequest $request, DirectoryCategory $directoryCategory)
    {
        $directoryCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$directoryCategory->image || $request->input('image') !== $directoryCategory->image->file_name) {
                if ($directoryCategory->image) {
                    $directoryCategory->image->delete();
                }
                $directoryCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($directoryCategory->image) {
            $directoryCategory->image->delete();
        }

        return redirect()->route('admin.directory-categories.index');
    }

    public function show(DirectoryCategory $directoryCategory)
    {
        abort_if(Gate::denies('directory_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryCategory->load('directorycategoryDirectorySubCategories');

        return view('admin.directoryCategories.show', compact('directoryCategory'));
    }

    public function destroy(DirectoryCategory $directoryCategory)
    {
        abort_if(Gate::denies('directory_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectoryCategoryRequest $request)
    {
        DirectoryCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('directory_category_create') && Gate::denies('directory_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DirectoryCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
