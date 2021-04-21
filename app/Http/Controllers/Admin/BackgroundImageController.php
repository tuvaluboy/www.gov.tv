<?php

namespace App\Http\Controllers\Admin;

use App\BackgroundImage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBackgroundImageRequest;
use App\Http\Requests\StoreBackgroundImageRequest;
use App\Http\Requests\UpdateBackgroundImageRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BackgroundImageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('background_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backgroundImages = BackgroundImage::with(['media'])->get();

        return view('admin.backgroundImages.index', compact('backgroundImages'));
    }

    public function create()
    {
        abort_if(Gate::denies('background_image_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backgroundImages.create');
    }

    public function store(StoreBackgroundImageRequest $request)
    {
        $backgroundImage = BackgroundImage::create($request->all());

        if ($request->input('image', false)) {
            $backgroundImage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $backgroundImage->id]);
        }

        return redirect()->route('admin.background-images.index');
    }

    public function edit(BackgroundImage $backgroundImage)
    {
        abort_if(Gate::denies('background_image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backgroundImages.edit', compact('backgroundImage'));
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

        return redirect()->route('admin.background-images.index');
    }

    public function show(BackgroundImage $backgroundImage)
    {
        abort_if(Gate::denies('background_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backgroundImages.show', compact('backgroundImage'));
    }

    public function destroy(BackgroundImage $backgroundImage)
    {
        abort_if(Gate::denies('background_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backgroundImage->delete();

        return back();
    }

    public function massDestroy(MassDestroyBackgroundImageRequest $request)
    {
        BackgroundImage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('background_image_create') && Gate::denies('background_image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BackgroundImage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
