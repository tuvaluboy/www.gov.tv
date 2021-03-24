<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DirectorySubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectorySubCategoryRequest;
use App\Http\Requests\UpdateDirectorySubCategoryRequest;
use App\Http\Resources\Admin\DirectorySubCategoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectorySubCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('directory_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectorySubCategoryResource(DirectorySubCategory::with(['directorycategory', 'contents'])->get());
    }

    public function store(StoreDirectorySubCategoryRequest $request)
    {
        $directorySubCategory = DirectorySubCategory::create($request->all());
        $directorySubCategory->contents()->sync($request->input('contents', []));

        return (new DirectorySubCategoryResource($directorySubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DirectorySubCategory $directorySubCategory)
    {
        abort_if(Gate::denies('directory_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectorySubCategoryResource($directorySubCategory->load(['directorycategory', 'contents']));
    }

    public function update(UpdateDirectorySubCategoryRequest $request, DirectorySubCategory $directorySubCategory)
    {
        $directorySubCategory->update($request->all());
        $directorySubCategory->contents()->sync($request->input('contents', []));

        return (new DirectorySubCategoryResource($directorySubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DirectorySubCategory $directorySubCategory)
    {
        abort_if(Gate::denies('directory_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorySubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
