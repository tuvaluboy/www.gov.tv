@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ministryContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ministry-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.id') }}
                        </th>
                        <td>
                            {{ $ministryContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.sub_categories') }}
                        </th>
                        <td>
                            @foreach($ministryContent->sub_categories as $key => $sub_categories)
                                <span class="label label-info">{{ $sub_categories->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.title') }}
                        </th>
                        <td>
                            {{ $ministryContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.description') }}
                        </th>
                        <td>
                            {!! $ministryContent->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.detailinformation') }}
                        </th>
                        <td>
                            {!! $ministryContent->detailinformation !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.contact_information') }}
                        </th>
                        <td>
                            {!! $ministryContent->contact_information !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.files') }}
                        </th>
                        <td>
                            @foreach($ministryContent->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ministryContent.fields.status') }}
                        </th>
                        <td>
                            {{ App\MinistryContent::STATUS_SELECT[$ministryContent->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ministry-contents.index') }}">
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
            <a class="nav-link" href="#ministry_directory_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.directoryContent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#content_directory_sub_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.directorySubCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ministry_directory_contents">
            @includeIf('admin.ministryContents.relationships.ministryDirectoryContents', ['directoryContents' => $ministryContent->ministryDirectoryContents])
        </div>
        <div class="tab-pane" role="tabpanel" id="content_directory_sub_categories">
            @includeIf('admin.ministryContents.relationships.contentDirectorySubCategories', ['directorySubCategories' => $ministryContent->contentDirectorySubCategories])
        </div>
    </div>
</div>

@endsection