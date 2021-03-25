@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.id') }}
                        </th>
                        <td>
                            {{ $tag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.name') }}
                        </th>
                        <td>
                            {{ $tag->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tags.index') }}">
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
            <a class="nav-link" href="#tags_directory_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.directoryContent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tags_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tags_services" role="tab" data-toggle="tab">
                {{ trans('cruds.service.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="tags_directory_contents">
            @includeIf('admin.tags.relationships.tagsDirectoryContents', ['directoryContents' => $tag->tagsDirectoryContents])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_items">
            @includeIf('admin.tags.relationships.tagsItems', ['items' => $tag->tagsItems])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_services">
            @includeIf('admin.tags.relationships.tagsServices', ['services' => $tag->tagsServices])
        </div>
    </div>
</div>

@endsection