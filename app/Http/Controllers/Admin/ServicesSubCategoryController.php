<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServicesSubCategoryRequest;
use App\Http\Requests\StoreServicesSubCategoryRequest;
use App\Http\Requests\UpdateServicesSubCategoryRequest;
use App\ServiceCategory;
use App\ServicesSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('services_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesSubCategories = ServicesSubCategory::all();

        return view('admin.servicesSubCategories.index', compact('servicesSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('services_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicescategories = ServiceCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.servicesSubCategories.create', compact('servicescategories'));
    }

    public function store(StoreServicesSubCategoryRequest $request)
    {
        $servicesSubCategory = ServicesSubCategory::create($request->all());

        return redirect()->route('admin.services-sub-categories.index');
    }

    public function edit(ServicesSubCategory $servicesSubCategory)
    {
        abort_if(Gate::denies('services_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicescategories = ServiceCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $servicesSubCategory->load('servicescategory');

        return view('admin.servicesSubCategories.edit', compact('servicescategories', 'servicesSubCategory'));
    }

    public function update(UpdateServicesSubCategoryRequest $request, ServicesSubCategory $servicesSubCategory)
    {
        $servicesSubCategory->update($request->all());

        return redirect()->route('admin.services-sub-categories.index');
    }

    public function show(ServicesSubCategory $servicesSubCategory)
    {
        abort_if(Gate::denies('services_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesSubCategory->load('servicescategory');

        return view('admin.servicesSubCategories.show', compact('servicesSubCategory'));
    }

    public function destroy(ServicesSubCategory $servicesSubCategory)
    {
        abort_if(Gate::denies('services_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicesSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyServicesSubCategoryRequest $request)
    {
        ServicesSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
