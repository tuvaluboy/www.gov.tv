@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.aboutuvalu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.aboutuvalus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutuvalu.fields.id') }}
                        </th>
                        <td>
                            {{ $aboutuvalu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutuvalu.fields.title') }}
                        </th>
                        <td>
                            {{ $aboutuvalu->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutuvalu.fields.description') }}
                        </th>
                        <td>
                            {!! $aboutuvalu->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.aboutuvalus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection