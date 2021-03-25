<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Http\Resources\Admin\ContentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentResource(Content::all());
    }

    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->all());

        return (new ContentResource($content))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Content $content)
    {
        abort_if(Gate::denies('content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentResource($content);
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $content->update($request->all());

        return (new ContentResource($content))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Content $content)
    {
        abort_if(Gate::denies('content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
