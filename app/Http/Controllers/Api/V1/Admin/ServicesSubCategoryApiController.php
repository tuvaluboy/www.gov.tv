<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServicesSubCategoryRequest;
use App\Http\Requests\UpdateServicesSubCategoryRequest;
use App\Http\Resources\Admin\ServicesSubCategoryResource;
use App\ServicesSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesSubCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('services_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServicesSubCategoryResource(ServicesSubCategory::with(['servicescategory'])->get());
    }

    public function store(StoreServicesSubCategoryRequest $request)
    {
        $servicesSubCategory = ServicesSubCategory::create($request->all());

        return (new ServicesSubCategoryResource($servicesSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ServicesSubCategory $servicesSubCategory)
    {
        abort_if(Gate::denies('services_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServicesSubCategoryResource($servicesSubCategory->load(['servicescategory']));
    }

    public function update(UpdateServicesSubCategoryRequest $request, ServicesSubCategory $servicesSubCategory)
    {
        $servicesSubCategory->update($request->all());

        return (new ServicesSubCategoryResource($servicesSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ServicesSubCategory $servicesSubCategory)
    {
        abort_if(Gate::denies('services_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
