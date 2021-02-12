<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DirectoryCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectoryCategoryRequest;
use App\Http\Requests\UpdateDirectoryCategoryRequest;
use App\Http\Resources\Admin\DirectoryCategoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectoryCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('directory_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectoryCategoryResource(DirectoryCategory::all());
    }

    public function store(StoreDirectoryCategoryRequest $request)
    {
        $directoryCategory = DirectoryCategory::create($request->all());

        return (new DirectoryCategoryResource($directoryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DirectoryCategory $directoryCategory)
    {
        abort_if(Gate::denies('directory_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectoryCategoryResource($directoryCategory);
    }

    public function update(UpdateDirectoryCategoryRequest $request, DirectoryCategory $directoryCategory)
    {
        $directoryCategory->update($request->all());

        return (new DirectoryCategoryResource($directoryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DirectoryCategory $directoryCategory)
    {
        abort_if(Gate::denies('directory_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directoryCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
