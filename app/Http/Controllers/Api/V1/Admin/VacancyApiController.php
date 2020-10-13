<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Http\Resources\Admin\VacancyResource;
use App\Vacancy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VacancyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vacancy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VacancyResource(Vacancy::all());
    }

    public function store(StoreVacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->all());

        if ($request->input('file', false)) {
            $vacancy->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new VacancyResource($vacancy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vacancy $vacancy)
    {
        abort_if(Gate::denies('vacancy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VacancyResource($vacancy);
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

        return (new VacancyResource($vacancy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vacancy $vacancy)
    {
        abort_if(Gate::denies('vacancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacancy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
