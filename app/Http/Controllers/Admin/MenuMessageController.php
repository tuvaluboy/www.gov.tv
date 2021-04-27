<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMenuMessageRequest;
use App\Http\Requests\StoreMenuMessageRequest;
use App\Http\Requests\UpdateMenuMessageRequest;
use App\MenuMessage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MenuMessageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('menu_message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuMessages = MenuMessage::all();

        return view('admin.menuMessages.index', compact('menuMessages'));
    }

    public function create()
    {
        abort_if(Gate::denies('menu_message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuMessages.create');
    }

    public function store(StoreMenuMessageRequest $request)
    {
        $menuMessage = MenuMessage::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $menuMessage->id]);
        }

        return redirect()->route('admin.menu-messages.index');
    }

    public function edit(MenuMessage $menuMessage)
    {
        abort_if(Gate::denies('menu_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuMessages.edit', compact('menuMessage'));
    }

    public function update(UpdateMenuMessageRequest $request, MenuMessage $menuMessage)
    {
        $menuMessage->update($request->all());

        return redirect()->route('admin.menu-messages.index');
    }

    public function show(MenuMessage $menuMessage)
    {
        abort_if(Gate::denies('menu_message_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuMessages.show', compact('menuMessage'));
    }

    public function destroy(MenuMessage $menuMessage)
    {
        abort_if(Gate::denies('menu_message_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuMessage->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuMessageRequest $request)
    {
        MenuMessage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('menu_message_create') && Gate::denies('menu_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MenuMessage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
