@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.servicesSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services-sub-categories.update", [$servicesSubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.servicesSubCategory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $servicesSubCategory->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicesSubCategory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servicescategory_id">{{ trans('cruds.servicesSubCategory.fields.servicescategory') }}</label>
                <select class="form-control select2 {{ $errors->has('servicescategory') ? 'is-invalid' : '' }}" name="servicescategory_id" id="servicescategory_id">
                    @foreach($servicescategories as $id => $servicescategory)
                        <option value="{{ $id }}" {{ (old('servicescategory_id') ? old('servicescategory_id') : $servicesSubCategory->servicescategory->id ?? '') == $id ? 'selected' : '' }}>{{ $servicescategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('servicescategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servicescategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicesSubCategory.fields.servicescategory_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.servicesSubCategory.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\ServicesSubCategory::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $servicesSubCategory->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicesSubCategory.fields.status_helper') }}</span>
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