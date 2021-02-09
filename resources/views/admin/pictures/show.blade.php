@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.picture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.picture.fields.id') }}
                        </th>
                        <td>
                            {{ $picture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.picture.fields.title') }}
                        </th>
                        <td>
                            {{ $picture->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.picture.fields.images') }}
                        </th>
                        <td>
                            @foreach($picture->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.picture.fields.page') }}
                        </th>
                        <td>
                            {{ $picture->page->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection