<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Aboutuvalu;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAboutuvaluRequest;
use App\Http\Requests\UpdateAboutuvaluRequest;
use App\Http\Resources\Admin\AboutuvaluResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutuvaluApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('aboutuvalu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutuvaluResource(Aboutuvalu::all());
    }

    public function store(StoreAboutuvaluRequest $request)
    {
        $aboutuvalu = Aboutuvalu::create($request->all());

        return (new AboutuvaluResource($aboutuvalu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Aboutuvalu $aboutuvalu)
    {
        abort_if(Gate::denies('aboutuvalu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutuvaluResource($aboutuvalu);
    }

    public function update(UpdateAboutuvaluRequest $request, Aboutuvalu $aboutuvalu)
    {
        $aboutuvalu->update($request->all());

        return (new AboutuvaluResource($aboutuvalu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Aboutuvalu $aboutuvalu)
    {
        abort_if(Gate::denies('aboutuvalu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutuvalu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
