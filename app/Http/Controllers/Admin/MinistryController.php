<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMinistryRequest;
use App\Http\Requests\StoreMinistryRequest;
use App\Http\Requests\UpdateMinistryRequest;
use App\Ministry;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinistryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ministry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministries = Ministry::all();

        return view('admin.ministries.index', compact('ministries'));
    }

    public function create()
    {
        abort_if(Gate::denies('ministry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authorities = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ministries.create', compact('authorities'));
    }

    public function store(StoreMinistryRequest $request)
    {
        $ministry = Ministry::create($request->all());

        return redirect()->route('admin.ministries.index');
    }

    public function edit(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authorities = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ministry->load('authority');

        return view('admin.ministries.edit', compact('authorities', 'ministry'));
    }

    public function update(UpdateMinistryRequest $request, Ministry $ministry)
    {
        $ministry->update($request->all());

        return redirect()->route('admin.ministries.index');
    }

    public function show(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministry->load('authority');

        return view('admin.ministries.show', compact('ministry'));
    }

    public function destroy(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministry->delete();

        return back();
    }

    public function massDestroy(MassDestroyMinistryRequest $request)
    {
        Ministry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
