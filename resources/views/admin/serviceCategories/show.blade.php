@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.serviceCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $serviceCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $serviceCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceCategory.fields.description') }}
                        </th>
                        <td>
                            {!! $serviceCategory->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\ServiceCategory::STATUS_SELECT[$serviceCategory->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection