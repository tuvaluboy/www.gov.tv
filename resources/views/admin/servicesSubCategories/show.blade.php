@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.servicesSubCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesSubCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $servicesSubCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesSubCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $servicesSubCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesSubCategory.fields.servicescategory') }}
                        </th>
                        <td>
                            {{ $servicesSubCategory->servicescategory->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesSubCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\ServicesSubCategory::STATUS_SELECT[$servicesSubCategory->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection