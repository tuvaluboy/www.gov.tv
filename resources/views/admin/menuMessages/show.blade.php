@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.menuMessage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.menu-messages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.menuMessage.fields.id') }}
                        </th>
                        <td>
                            {{ $menuMessage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.menuMessage.fields.page') }}
                        </th>
                        <td>
                            {{ App\MenuMessage::PAGE_SELECT[$menuMessage->page] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.menuMessage.fields.description') }}
                        </th>
                        <td>
                            {!! $menuMessage->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.menuMessage.fields.status') }}
                        </th>
                        <td>
                            {{ App\MenuMessage::STATUS_SELECT[$menuMessage->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.menu-messages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection