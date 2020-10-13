@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newsandUpdate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newsand-updates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.id') }}
                        </th>
                        <td>
                            {{ $newsandUpdate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.title') }}
                        </th>
                        <td>
                            {{ $newsandUpdate->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.description') }}
                        </th>
                        <td>
                            {!! $newsandUpdate->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.type') }}
                        </th>
                        <td>
                            {{ App\NewsandUpdate::TYPE_SELECT[$newsandUpdate->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.author') }}
                        </th>
                        <td>
                            {{ $newsandUpdate->author->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.file') }}
                        </th>
                        <td>
                            @if($newsandUpdate->file)
                                <a href="{{ $newsandUpdate->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsandUpdate.fields.image') }}
                        </th>
                        <td>
                            @if($newsandUpdate->image)
                                <a href="{{ $newsandUpdate->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $newsandUpdate->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newsand-updates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection