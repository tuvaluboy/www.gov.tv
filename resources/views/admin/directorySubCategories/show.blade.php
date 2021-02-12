@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.directorySubCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.directorySubCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $directorySubCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorySubCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $directorySubCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorySubCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\DirectorySubCategory::STATUS_SELECT[$directorySubCategory->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorySubCategory.fields.directorycategory') }}
                        </th>
                        <td>
                            {{ $directorySubCategory->directorycategory->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-sub-categories.index') }}">
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
            <a class="nav-link" href="#directorysubcategory_directory_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.directoryContent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="directorysubcategory_directory_contents">
            @includeIf('admin.directorySubCategories.relationships.directorysubcategoryDirectoryContents', ['directoryContents' => $directorySubCategory->directorysubcategoryDirectoryContents])
        </div>
    </div>
</div>

@endsection