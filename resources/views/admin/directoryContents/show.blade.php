@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.directoryContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.id') }}
                        </th>
                        <td>
                            {{ $directoryContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.type') }}
                        </th>
                        <td>
                            {{ App\DirectoryContent::TYPE_SELECT[$directoryContent->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.title') }}
                        </th>
                        <td>
                            {{ $directoryContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.description') }}
                        </th>
                        <td>
                            {!! $directoryContent->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.status') }}
                        </th>
                        <td>
                            {{ App\DirectoryContent::STATUS_SELECT[$directoryContent->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.detailinformation') }}
                        </th>
                        <td>
                            {!! $directoryContent->detailinformation !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.contact_information') }}
                        </th>
                        <td>
                            {!! $directoryContent->contact_information !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directory-contents.index') }}">
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
            <a class="nav-link" href="#contact_services" role="tab" data-toggle="tab">
                {{ trans('cruds.service.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#content_directory_sub_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.directorySubCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="contact_services">
            @includeIf('admin.directoryContents.relationships.contactServices', ['services' => $directoryContent->contactServices])
        </div>
        <div class="tab-pane" role="tabpanel" id="content_directory_sub_categories">
            @includeIf('admin.directoryContents.relationships.contentDirectorySubCategories', ['directorySubCategories' => $directoryContent->contentDirectorySubCategories])
        </div>
    </div>
</div>

@endsection