<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreImageslideRequest;
use App\Http\Requests\UpdateImageslideRequest;
use App\Http\Resources\Admin\ImageslideResource;
use App\Imageslide;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageslidesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('imageslide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageslideResource(Imageslide::with(['page'])->get());
    }

    public function store(StoreImageslideRequest $request)
    {
        $imageslide = Imageslide::create($request->all());

        if ($request->input('image', false)) {
            $imageslide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new ImageslideResource($imageslide))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Imageslide $imageslide)
    {
        abort_if(Gate::denies('imageslide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageslideResource($imageslide->load(['page']));
    }

    public function update(UpdateImageslideRequest $request, Imageslide $imageslide)
    {
        $imageslide->update($request->all());

        if ($request->input('image', false)) {
            if (!$imageslide->image || $request->input('image') !== $imageslide->image->file_name) {
                if ($imageslide->image) {
                    $imageslide->image->delete();
                }

                $imageslide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($imageslide->image) {
            $imageslide->image->delete();
        }

        return (new ImageslideResource($imageslide))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Imageslide $imageslide)
    {
        abort_if(Gate::denies('imageslide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageslide->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
