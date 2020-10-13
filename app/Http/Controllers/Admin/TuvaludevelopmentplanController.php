<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTuvaludevelopmentplanRequest;
use App\Http\Requests\StoreTuvaludevelopmentplanRequest;
use App\Http\Requests\UpdateTuvaludevelopmentplanRequest;
use App\Tuvaludevelopmentplan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TuvaludevelopmentplanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaludevelopmentplans = Tuvaludevelopmentplan::all();

        return view('admin.tuvaludevelopmentplans.index', compact('tuvaludevelopmentplans'));
    }

    public function create()
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaludevelopmentplans.create');
    }

    public function store(StoreTuvaludevelopmentplanRequest $request)
    {
        $tuvaludevelopmentplan = Tuvaludevelopmentplan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tuvaludevelopmentplan->id]);
        }

        return redirect()->route('admin.tuvaludevelopmentplans.index');
    }

    public function edit(Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaludevelopmentplans.edit', compact('tuvaludevelopmentplan'));
    }

    public function update(UpdateTuvaludevelopmentplanRequest $request, Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        $tuvaludevelopmentplan->update($request->all());

        return redirect()->route('admin.tuvaludevelopmentplans.index');
    }

    public function show(Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaludevelopmentplans.show', compact('tuvaludevelopmentplan'));
    }

    public function destroy(Tuvaludevelopmentplan $tuvaludevelopmentplan)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaludevelopmentplan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTuvaludevelopmentplanRequest $request)
    {
        Tuvaludevelopmentplan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_create') && Gate::denies('tuvaludevelopmentplan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tuvaludevelopmentplan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
