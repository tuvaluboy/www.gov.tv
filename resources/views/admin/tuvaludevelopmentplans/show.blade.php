@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tuvaludevelopmentplan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tuvaludevelopmentplans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaludevelopmentplan.fields.id') }}
                        </th>
                        <td>
                            {{ $tuvaludevelopmentplan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaludevelopmentplan.fields.title') }}
                        </th>
                        <td>
                            {{ $tuvaludevelopmentplan->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaludevelopmentplan.fields.description') }}
                        </th>
                        <td>
                            {!! $tuvaludevelopmentplan->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tuvaludevelopmentplans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection