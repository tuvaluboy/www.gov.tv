<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceCategoryRequest;
use App\Http\Requests\StoreServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use App\ServiceCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServiceCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceCategories = ServiceCategory::all();

        return view('admin.serviceCategories.index', compact('serviceCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceCategories.create');
    }

    public function store(StoreServiceCategoryRequest $request)
    {
        $serviceCategory = ServiceCategory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $serviceCategory->id]);
        }

        return redirect()->route('admin.service-categories.index');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        abort_if(Gate::denies('service_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceCategories.edit', compact('serviceCategory'));
    }

    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->update($request->all());

        return redirect()->route('admin.service-categories.index');
    }

    public function show(ServiceCategory $serviceCategory)
    {
        abort_if(Gate::denies('service_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceCategories.show', compact('serviceCategory'));
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        abort_if(Gate::denies('service_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceCategoryRequest $request)
    {
        ServiceCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_category_create') && Gate::denies('service_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ServiceCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
