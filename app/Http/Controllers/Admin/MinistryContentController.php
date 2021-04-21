<?php

namespace App\Http\Controllers\Admin;

use App\DirectorySubCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMinistryContentRequest;
use App\Http\Requests\StoreMinistryContentRequest;
use App\Http\Requests\UpdateMinistryContentRequest;
use App\MinistryContent;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MinistryContentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ministry_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministryContents = MinistryContent::with(['sub_categories', 'media'])->get();

        $directory_sub_categories = DirectorySubCategory::get();

        return view('admin.ministryContents.index', compact('ministryContents', 'directory_sub_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('ministry_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = DirectorySubCategory::all()->pluck('title', 'id');

        return view('admin.ministryContents.create', compact('sub_categories'));
    }

    public function store(StoreMinistryContentRequest $request)
    {
        $ministryContent = MinistryContent::create($request->all());
        $ministryContent->sub_categories()->sync($request->input('sub_categories', []));
        foreach ($request->input('files', []) as $file) {
            $ministryContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ministryContent->id]);
        }

        return redirect()->route('admin.ministry-contents.index');
    }

    public function edit(MinistryContent $ministryContent)
    {
        abort_if(Gate::denies('ministry_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = DirectorySubCategory::all()->pluck('title', 'id');

        $ministryContent->load('sub_categories');

        return view('admin.ministryContents.edit', compact('sub_categories', 'ministryContent'));
    }

    public function update(UpdateMinistryContentRequest $request, MinistryContent $ministryContent)
    {
        $ministryContent->update($request->all());
        $ministryContent->sub_categories()->sync($request->input('sub_categories', []));
        if (count($ministryContent->files) > 0) {
            foreach ($ministryContent->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $ministryContent->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $ministryContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.ministry-contents.index');
    }

    public function show(MinistryContent $ministryContent)
    {
        abort_if(Gate::denies('ministry_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministryContent->load('sub_categories', 'ministryDirectoryContents', 'contentDirectorySubCategories');

        return view('admin.ministryContents.show', compact('ministryContent'));
    }

    public function destroy(MinistryContent $ministryContent)
    {
        abort_if(Gate::denies('ministry_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministryContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyMinistryContentRequest $request)
    {
        MinistryContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ministry_content_create') && Gate::denies('ministry_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MinistryContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
