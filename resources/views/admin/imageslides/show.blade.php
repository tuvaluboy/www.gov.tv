@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.imageslide.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.imageslides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.id') }}
                        </th>
                        <td>
                            {{ $imageslide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.title') }}
                        </th>
                        <td>
                            {{ $imageslide->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.image') }}
                        </th>
                        <td>
                            @if($imageslide->image)
                                <a href="{{ $imageslide->image->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.page') }}
                        </th>
                        <td>
                            {{ $imageslide->page->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.description') }}
                        </th>
                        <td>
                            {{ $imageslide->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.firstbutton') }}
                        </th>
                        <td>
                            {{ $imageslide->firstbutton }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.firstbutton_link') }}
                        </th>
                        <td>
                            {{ $imageslide->firstbutton_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.secondbutton') }}
                        </th>
                        <td>
                            {{ $imageslide->secondbutton }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.secondbutton_link') }}
                        </th>
                        <td>
                            {{ $imageslide->secondbutton_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageslide.fields.status') }}
                        </th>
                        <td>
                            {{ App\Imageslide::STATUS_SELECT[$imageslide->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.imageslides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection