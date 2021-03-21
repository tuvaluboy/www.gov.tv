@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.name') }}
                        </th>
                        <td>
                            {{ $page->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.description') }}
                        </th>
                        <td>
                            {{ $page->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#page_pictures" role="tab" data-toggle="tab">
                {{ trans('cruds.picture.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="page_pictures">
            @includeIf('admin.pages.relationships.pagePictures', ['pictures' => $page->pagePictures])
        </div>
    </div>
</div>

@endsection
