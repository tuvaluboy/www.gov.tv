<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryContent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;
use App\ServicesSubCategory;
use App\Tag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::with(['servicessubcategory', 'contacts', 'tags'])->get();

        $services_sub_categories = ServicesSubCategory::get();

        $directory_contents = DirectoryContent::get();

        $tags = Tag::get();

        return view('admin.services.index', compact('services', 'services_sub_categories', 'directory_contents', 'tags'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicessubcategories = ServicesSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = DirectoryContent::all()->pluck('title', 'id');

        $tags = Tag::all()->pluck('name', 'id');

        return view('admin.services.create', compact('servicessubcategories', 'contacts', 'tags'));
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());
        $service->contacts()->sync($request->input('contacts', []));
        $service->tags()->sync($request->input('tags', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $service->id]);
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicessubcategories = ServicesSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = DirectoryContent::all()->pluck('title', 'id');

        $tags = Tag::all()->pluck('name', 'id');

        $service->load('servicessubcategory', 'contacts', 'tags');

        return view('admin.services.edit', compact('servicessubcategories', 'contacts', 'tags', 'service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());
        $service->contacts()->sync($request->input('contacts', []));
        $service->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->load('servicessubcategory', 'contacts', 'tags');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_create') && Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Service();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
