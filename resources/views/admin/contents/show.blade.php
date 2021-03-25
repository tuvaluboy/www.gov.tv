@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.content.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.content.fields.id') }}
                        </th>
                        <td>
                            {{ $content->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.content.fields.title') }}
                        </th>
                        <td>
                            {{ $content->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.content.fields.description') }}
                        </th>
                        <td>
                            {!! $content->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.content.fields.content') }}
                        </th>
                        <td>
                            {!! $content->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.content.fields.status') }}
                        </th>
                        <td>
                            {{ App\Content::STATUS_SELECT[$content->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection