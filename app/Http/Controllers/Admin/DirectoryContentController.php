<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryContent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDirectoryContentRequest;
use App\Http\Requests\StoreDirectoryContentRequest;
use App\Http\Requests\UpdateDirectoryContentRequest;
use App\MinistryContent;
use App\Tag;
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

        $directoryContents = DirectoryContent::with(['ministry', 'tags', 'media'])->get();

        $ministry_contents = MinistryContent::get();

        $tags = Tag::get();

        return view('admin.directoryContents.index', compact('directoryContents', 'ministry_contents', 'tags'));
    }

    public function create()
    {
        abort_if(Gate::denies('directory_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministries = MinistryContent::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = Tag::all()->pluck('name', 'id');

        return view('admin.directoryContents.create', compact('ministries', 'tags'));
    }

    public function store(StoreDirectoryContentRequest $request)
    {
        $directoryContent = DirectoryContent::create($request->all());
        $directoryContent->tags()->sync($request->input('tags', []));
        foreach ($request->input('files', []) as $file) {
            $directoryContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $directoryContent->id]);
        }

        return redirect()->route('admin.directory-contents.index');
    }

    public function edit(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministries = MinistryContent::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = Tag::all()->pluck('name', 'id');

        $directoryContent->load('ministry', 'tags');

        return view('admin.directoryContents.edit', compact('ministries', 'tags', 'directoryContent'));
    }

    public function update(UpdateDirectoryContentRequest $request, DirectoryContent $directoryContent)
    {
        $directoryContent->update($request->all());
        $directoryContent->tags()->sync($request->input('tags', []));
        if (count($directoryContent->files) > 0) {
            foreach ($directoryContent->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $directoryContent->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $directoryContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.directory-contents.index');
    }

    public function show(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryContent->load('ministry', 'tags', 'contactServices');

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
