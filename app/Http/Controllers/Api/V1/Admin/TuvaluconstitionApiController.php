<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTuvaluconstitionRequest;
use App\Http\Requests\UpdateTuvaluconstitionRequest;
use App\Http\Resources\Admin\TuvaluconstitionResource;
use App\Tuvaluconstition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TuvaluconstitionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tuvaluconstition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TuvaluconstitionResource(Tuvaluconstition::all());
    }

    public function store(StoreTuvaluconstitionRequest $request)
    {
        $tuvaluconstition = Tuvaluconstition::create($request->all());

        return (new TuvaluconstitionResource($tuvaluconstition))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tuvaluconstition $tuvaluconstition)
    {
        abort_if(Gate::denies('tuvaluconstition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TuvaluconstitionResource($tuvaluconstition);
    }

    public function update(UpdateTuvaluconstitionRequest $request, Tuvaluconstition $tuvaluconstition)
    {
        $tuvaluconstition->update($request->all());

        return (new TuvaluconstitionResource($tuvaluconstition))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tuvaluconstition $tuvaluconstition)
    {
        abort_if(Gate::denies('tuvaluconstition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaluconstition->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
