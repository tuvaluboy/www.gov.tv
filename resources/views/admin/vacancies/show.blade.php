@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vacancy.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.id') }}
                        </th>
                        <td>
                            {{ $vacancy->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.title') }}
                        </th>
                        <td>
                            {{ $vacancy->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.description') }}
                        </th>
                        <td>
                            {!! $vacancy->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.rate') }}
                        </th>
                        <td>
                            {{ $vacancy->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.level') }}
                        </th>
                        <td>
                            {{ $vacancy->level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.file') }}
                        </th>
                        <td>
                            @if($vacancy->file)
                                <a href="{{ $vacancy->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.duedate') }}
                        </th>
                        <td>
                            {{ $vacancy->duedate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacancy.fields.status') }}
                        </th>
                        <td>
                            {{ App\Vacancy::STATUS_SELECT[$vacancy->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection