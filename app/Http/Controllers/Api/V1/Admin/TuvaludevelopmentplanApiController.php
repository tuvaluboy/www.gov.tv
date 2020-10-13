<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTuvaludevelopmentplanRequest;
use App\Http\Requests\UpdateTuvaludevelopmentplanRequest;
use App\Http\Resources\Admin\TuvaludevelopmentplanResource;
use App\Tuvaludevelopmentplan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TuvaludevelopmentplanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TuvaludevelopmentplanResource(Tuvaludevelopmentplan::all());
    }

    public function store(StoreTuvaludevelopmentplanRequest $request)
    {
        $tuvaludevelopmentplan = Tuvaludevelopmentplan::create($request->all());

        return (new TuvaludevelopmentplanResource($tuvaludevelopmentplan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TuvaludevelopmentplanResource($tuvaludevelopmentplan);
    }

    public function update(UpdateTuvaludevelopmentplanRequest $request, Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        $tuvaludevelopmentplan->update($request->all());

        return (new TuvaludevelopmentplanResource($tuvaludevelopmentplan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaludevelopmentplan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
