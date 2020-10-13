<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTuvaluconstitionRequest;
use App\Http\Requests\StoreTuvaluconstitionRequest;
use App\Http\Requests\UpdateTuvaluconstitionRequest;
use App\Tuvaluconstition;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TuvaluconstitionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tuvaluconstition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaluconstitions = Tuvaluconstition::all();

        return view('admin.tuvaluconstitions.index', compact('tuvaluconstitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('tuvaluconstition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaluconstitions.create');
    }

    public function store(StoreTuvaluconstitionRequest $request)
    {
        $tuvaluconstition = Tuvaluconstition::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tuvaluconstition->id]);
        }

        return redirect()->route('admin.tuvaluconstitions.index');
    }

    public function edit(Tuvaluconstition $tuvaluconstition)
    {
        abort_if(Gate::denies('tuvaluconstition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaluconstitions.edit', compact('tuvaluconstition'));
    }

    public function update(UpdateTuvaluconstitionRequest $request, Tuvaluconstition $tuvaluconstition)
    {
        $tuvaluconstition->update($request->all());

        return redirect()->route('admin.tuvaluconstitions.index');
    }

    public function show(Tuvaluconstition $tuvaluconstition)
    {
        abort_if(Gate::denies('tuvaluconstition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tuvaluconstitions.show', compact('tuvaluconstition'));
    }

    public function destroy(Tuvaluconstition $tuvaluconstition)
    {
        abort_if(Gate::denies('tuvaluconstition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tuvaluconstition->delete();

        return back();
    }

    public function massDestroy(MassDestroyTuvaluconstitionRequest $request)
    {
        Tuvaluconstition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tuvaluconstition_create') && Gate::denies('tuvaluconstition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tuvaluconstition();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
