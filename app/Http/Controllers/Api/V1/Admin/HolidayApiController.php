<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Http\Resources\Admin\HolidayResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HolidayApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HolidayResource(Holiday::all());
    }

    public function store(StoreHolidayRequest $request)
    {
        $holiday = Holiday::create($request->all());

        return (new HolidayResource($holiday))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HolidayResource($holiday);
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());

        return (new HolidayResource($holiday))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holiday->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
