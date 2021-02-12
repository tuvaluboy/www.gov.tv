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
                            {{ trans('cruds.directoryContent.fields.detailinformation') }}
                        </th>
                        <td>
                            {{ $directoryContent->detailinformation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directoryContent.fields.directorysubcategory') }}
                        </th>
                        <td>
                            {{ $directoryContent->directorysubcategory->title ?? '' }}
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



@endsection