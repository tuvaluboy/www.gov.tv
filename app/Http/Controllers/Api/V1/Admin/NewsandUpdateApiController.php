<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNewsandUpdateRequest;
use App\Http\Requests\UpdateNewsandUpdateRequest;
use App\Http\Resources\Admin\NewsandUpdateResource;
use App\NewsandUpdate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsandUpdateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('newsand_update_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsandUpdateResource(NewsandUpdate::with(['author'])->get());
    }

    public function store(StoreNewsandUpdateRequest $request)
    {
        $newsandUpdate = NewsandUpdate::create($request->all());

        if ($request->input('file', false)) {
            $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($request->input('image', false)) {
            $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new NewsandUpdateResource($newsandUpdate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewsandUpdate $newsandUpdate)
    {
        abort_if(Gate::denies('newsand_update_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsandUpdateResource($newsandUpdate->load(['author']));
    }

    public function update(UpdateNewsandUpdateRequest $request, NewsandUpdate $newsandUpdate)
    {
        $newsandUpdate->update($request->all());

        if ($request->input('file', false)) {
            if (!$newsandUpdate->file || $request->input('file') !== $newsandUpdate->file->file_name) {
                if ($newsandUpdate->file) {
                    $newsandUpdate->file->delete();
                }

                $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($newsandUpdate->file) {
            $newsandUpdate->file->delete();
        }

        if ($request->input('image', false)) {
            if (!$newsandUpdate->image || $request->input('image') !== $newsandUpdate->image->file_name) {
                if ($newsandUpdate->image) {
                    $newsandUpdate->image->delete();
                }

                $newsandUpdate->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($newsandUpdate->image) {
            $newsandUpdate->image->delete();
        }

        return (new NewsandUpdateResource($newsandUpdate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewsandUpdate $newsandUpdate)
    {
        abort_if(Gate::denies('newsand_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsandUpdate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
