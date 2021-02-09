<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePictureRequest;
use App\Http\Requests\UpdatePictureRequest;
use App\Http\Resources\Admin\PictureResource;
use App\Picture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PicturesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PictureResource(Picture::with(['page'])->get());
    }

    public function store(StorePictureRequest $request)
    {
        $picture = Picture::create($request->all());

        if ($request->input('images', false)) {
            $picture->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
        }

        return (new PictureResource($picture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Picture $picture)
    {
        abort_if(Gate::denies('picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PictureResource($picture->load(['page']));
    }

    public function update(UpdatePictureRequest $request, Picture $picture)
    {
        $picture->update($request->all());

        if ($request->input('images', false)) {
            if (!$picture->images || $request->input('images') !== $picture->images->file_name) {
                if ($picture->images) {
                    $picture->images->delete();
                }

                $picture->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
            }
        } elseif ($picture->images) {
            $picture->images->delete();
        }

        return (new PictureResource($picture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Picture $picture)
    {
        abort_if(Gate::denies('picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $picture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
