<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DirectoryContent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDirectoryContentRequest;
use App\Http\Requests\UpdateDirectoryContentRequest;
use App\Http\Resources\Admin\DirectoryContentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectoryContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('directory_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectoryContentResource(DirectoryContent::all());
    }

    public function store(StoreDirectoryContentRequest $request)
    {
        $directoryContent = DirectoryContent::create($request->all());

        return (new DirectoryContentResource($directoryContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectoryContentResource($directoryContent);
    }

    public function update(UpdateDirectoryContentRequest $request, DirectoryContent $directoryContent)
    {
        $directoryContent->update($request->all());

        return (new DirectoryContentResource($directoryContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DirectoryContent $directoryContent)
    {
        abort_if(Gate::denies('directory_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
