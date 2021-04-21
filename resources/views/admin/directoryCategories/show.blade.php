@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.directoryCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $directoryCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $directoryCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $directoryCategory->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\DirectoryCategory::STATUS_SELECT[$directoryCategory->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryCategory.fields.image') }}
                        </th>
                        <td>
                            @if($directoryCategory->image)
                                <a href="{{ $directoryCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $directoryCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-categories.index') }}">
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
            <a class="nav-link" href="#directorycategory_directory_sub_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.directorySubCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="directorycategory_directory_sub_categories">
            @includeIf('admin.directoryCategories.relationships.directorycategoryDirectorySubCategories', ['directorySubCategories' => $directoryCategory->directorycategoryDirectorySubCategories])
        </div>
    </div>
</div>

@endsection