<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVacancyRequest;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Vacancy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VacancyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vacancy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacancies = Vacancy::all();

        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        abort_if(Gate::denies('vacancy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacancies.create');
    }

    public function store(StoreVacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->all());

        if ($request->input('file', false)) {
            $vacancy->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vacancy->id]);
        }

        return redirect()->route('admin.vacancies.index');
    }

    public function edit(Vacancy $vacancy)
    {
        abort_if(Gate::denies('vacancy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacancies.edit', compact('vacancy'));
    }

    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());

        if ($request->input('file', false)) {
            if (!$vacancy->file || $request->input('file') !== $vacancy->file->file_name) {
                if ($vacancy->file) {
                    $vacancy->file->delete();
                }

                $vacancy->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($vacancy->file) {
            $vacancy->file->delete();
        }

        return redirect()->route('admin.vacancies.index');
    }

    public function show(Vacancy $vacancy)
    {
        abort_if(Gate::denies('vacancy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacancies.show', compact('vacancy'));
    }

    public function destroy(Vacancy $vacancy)
    {
        abort_if(Gate::denies('vacancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacancy->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacancyRequest $request)
    {
        Vacancy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vacancy_create') && Gate::denies('vacancy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vacancy();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
