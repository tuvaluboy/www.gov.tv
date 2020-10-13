<?php

namespace App\Http\Controllers\Admin;

use App\Aboutuvalu;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAboutuvaluRequest;
use App\Http\Requests\StoreAboutuvaluRequest;
use App\Http\Requests\UpdateAboutuvaluRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AboutuvaluController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('aboutuvalu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutuvalus = Aboutuvalu::all();

        return view('admin.aboutuvalus.index', compact('aboutuvalus'));
    }

    public function create()
    {
        abort_if(Gate::denies('aboutuvalu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutuvalus.create');
    }

    public function store(StoreAboutuvaluRequest $request)
    {
        $aboutuvalu = Aboutuvalu::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $aboutuvalu->id]);
        }

        return redirect()->route('admin.aboutuvalus.index');
    }

    public function edit(Aboutuvalu $aboutuvalu)
    {
        abort_if(Gate::denies('aboutuvalu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutuvalus.edit', compact('aboutuvalu'));
    }

    public function update(UpdateAboutuvaluRequest $request, Aboutuvalu $aboutuvalu)
    {
        $aboutuvalu->update($request->all());

        return redirect()->route('admin.aboutuvalus.index');
    }

    public function show(Aboutuvalu $aboutuvalu)
    {
        abort_if(Gate::denies('aboutuvalu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutuvalus.show', compact('aboutuvalu'));
    }

    public function destroy(Aboutuvalu $aboutuvalu)
    {
        abort_if(Gate::denies('aboutuvalu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutuvalu->delete();

        return back();
    }

    public function massDestroy(MassDestroyAboutuvaluRequest $request)
    {
        Aboutuvalu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('aboutuvalu_create') && Gate::denies('aboutuvalu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Aboutuvalu();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
