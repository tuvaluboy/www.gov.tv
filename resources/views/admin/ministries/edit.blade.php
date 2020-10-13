@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ministry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ministries.update", [$ministry->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.ministry.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $ministry->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministry.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="authority_id">{{ trans('cruds.ministry.fields.authority') }}</label>
                <select class="form-control select2 {{ $errors->has('authority') ? 'is-invalid' : '' }}" name="authority_id" id="authority_id">
                    @foreach($authorities as $id => $authority)
                        <option value="{{ $id }}" {{ (old('authority_id') ? old('authority_id') : $ministry->authority->id ?? '') == $id ? 'selected' : '' }}>{{ $authority }}</option>
                    @endforeach
                </select>
                @if($errors->has('authority'))
                    <div class="invalid-feedback">
                        {{ $errors->first('authority') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministry.fields.authority_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color">{{ trans('cruds.ministry.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $ministry->color) }}">
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministry.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection