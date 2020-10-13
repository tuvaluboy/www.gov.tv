@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tuvaluconstition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tuvaluconstitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaluconstition.fields.id') }}
                        </th>
                        <td>
                            {{ $tuvaluconstition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaluconstition.fields.tittle') }}
                        </th>
                        <td>
                            {{ $tuvaluconstition->tittle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tuvaluconstition.fields.description') }}
                        </th>
                        <td>
                            {!! $tuvaluconstition->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tuvaluconstitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection