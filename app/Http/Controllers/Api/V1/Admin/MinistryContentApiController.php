<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMinistryContentRequest;
use App\Http\Requests\UpdateMinistryContentRequest;
use App\Http\Resources\Admin\MinistryContentResource;
use App\MinistryContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinistryContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ministry_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MinistryContentResource(MinistryContent::with(['sub_categories'])->get());
    }

    public function store(StoreMinistryContentRequest $request)
    {
        $ministryContent = MinistryContent::create($request->all());
        $ministryContent->sub_categories()->sync($request->input('sub_categories', []));

        return (new MinistryContentResource($ministryContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MinistryContent $ministryContent)
    {
        abort_if(Gate::denies('ministry_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MinistryContentResource($ministryContent->load(['sub_categories']));
    }

    public function update(UpdateMinistryContentRequest $request, MinistryContent $ministryContent)
    {
        $ministryContent->update($request->all());
        $ministryContent->sub_categories()->sync($request->input('sub_categories', []));

        return (new MinistryContentResource($ministryContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MinistryContent $ministryContent)
    {
        abort_if(Gate::denies('ministry_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministryContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
