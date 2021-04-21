@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.backgroundImage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.background-images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.id') }}
                        </th>
                        <td>
                            {{ $backgroundImage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.page') }}
                        </th>
                        <td>
                            {{ App\BackgroundImage::PAGE_SELECT[$backgroundImage->page] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.image') }}
                        </th>
                        <td>
                            @if($backgroundImage->image)
                                <a href="{{ $backgroundImage->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $backgroundImage->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backgroundImage.fields.status') }}
                        </th>
                        <td>
                            {{ App\BackgroundImage::STATUS_SELECT[$backgroundImage->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.background-images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection