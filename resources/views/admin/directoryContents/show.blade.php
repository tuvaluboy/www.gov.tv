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
                            {{ trans('cruds.directoryContent.fields.ministry') }}
                        </th>
                        <td>
                            {{ $directoryContent->ministry->title ?? '' }}
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
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.tags') }}
                        </th>
                        <td>
                            @foreach($directoryContent->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.files') }}
                        </th>
                        <td>
                            @foreach($directoryContent->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
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
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="contact_services">
            @includeIf('admin.directoryContents.relationships.contactServices', ['services' => $directoryContent->contactServices])
        </div>
    </div>
</div>

@endsection