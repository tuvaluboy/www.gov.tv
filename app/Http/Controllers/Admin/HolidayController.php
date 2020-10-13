<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHolidayRequest;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HolidayController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidays = Holiday::all();

        return view('admin.holidays.index', compact('holidays'));
    }

    public function create()
    {
        abort_if(Gate::denies('holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidays.create');
    }

    public function store(StoreHolidayRequest $request)
    {
        $holiday = Holiday::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $holiday->id]);
        }

        return redirect()->route('admin.holidays.index');
    }

    public function edit(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidays.edit', compact('holiday'));
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());

        return redirect()->route('admin.holidays.index');
    }

    public function show(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidays.show', compact('holiday'));
    }

    public function destroy(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holiday->delete();

        return back();
    }

    public function massDestroy(MassDestroyHolidayRequest $request)
    {
        Holiday::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('holiday_create') && Gate::denies('holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Holiday();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
