<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\BackgroundImage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBackgroundImageRequest;
use App\Http\Requests\UpdateBackgroundImageRequest;
use App\Http\Resources\Admin\BackgroundImageResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackgroundImageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('background_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackgroundImageResource(BackgroundImage::all());
    }

    public function store(StoreBackgroundImageRequest $request)
    {
        $backgroundImage = BackgroundImage::create($request->all());

        if ($request->input('image', false)) {
            $backgroundImage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new BackgroundImageResource($backgroundImage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BackgroundImage $backgroundImage)
    {
        abort_if(Gate::denies('background_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackgroundImageResource($backgroundImage);
    }

    public function update(UpdateBackgroundImageRequest $request, BackgroundImage $backgroundImage)
    {
        $backgroundImage->update($request->all());

        if ($request->input('image', false)) {
            if (!$backgroundImage->image || $request->input('image') !== $backgroundImage->image->file_name) {
                if ($backgroundImage->image) {
                    $backgroundImage->image->delete();
                }
                $backgroundImage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($backgroundImage->image) {
            $backgroundImage->image->delete();
        }

        return (new BackgroundImageResource($backgroundImage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BackgroundImage $backgroundImage)
    {
        abort_if(Gate::denies('background_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backgroundImage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
