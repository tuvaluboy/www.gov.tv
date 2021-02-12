<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryCategory;
use App\DirectorySubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDirectorySubCategoryRequest;
use App\Http\Requests\StoreDirectorySubCategoryRequest;
use App\Http\Requests\UpdateDirectorySubCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectorySubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('directory_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorySubCategories = DirectorySubCategory::with(['directorycategory'])->get();

        return view('admin.directorySubCategories.index', compact('directorySubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('directory_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorycategories = DirectoryCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.directorySubCategories.create', compact('directorycategories'));
    }

    public function store(StoreDirectorySubCategoryRequest $request)
    {
        $directorySubCategory = DirectorySubCategory::create($request->all());

        return redirect()->route('admin.directory-sub-categories.index');
    }

    public function edit(DirectorySubCategory $directorySubCategory)
    {
        abort_if(Gate::denies('directory_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorycategories = DirectoryCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $directorySubCategory->load('directorycategory');

        return view('admin.directorySubCategories.edit', compact('directorycategories', 'directorySubCategory'));
    }

    public function update(UpdateDirectorySubCategoryRequest $request, DirectorySubCategory $directorySubCategory)
    {
        $directorySubCategory->update($request->all());

        return redirect()->route('admin.directory-sub-categories.index');
    }

    public function show(DirectorySubCategory $directorySubCategory)
    {
        abort_if(Gate::denies('directory_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorySubCategory->load('directorycategory', 'directorysubcategoryDirectoryContents');

        return view('admin.directorySubCategories.show', compact('directorySubCategory'));
    }

    public function destroy(DirectorySubCategory $directorySubCategory)
    {
        abort_if(Gate::denies('directory_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorySubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectorySubCategoryRequest $request)
    {
        DirectorySubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
