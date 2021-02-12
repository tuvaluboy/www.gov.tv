@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.directorySubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.directory-sub-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.directorySubCategory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directorySubCategory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.directorySubCategory.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DirectorySubCategory::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Hidden') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directorySubCategory.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="directorycategory_id">{{ trans('cruds.directorySubCategory.fields.directorycategory') }}</label>
                <select class="form-control select2 {{ $errors->has('directorycategory') ? 'is-invalid' : '' }}" name="directorycategory_id" id="directorycategory_id">
                    @foreach($directorycategories as $id => $directorycategory)
                        <option value="{{ $id }}" {{ old('directorycategory_id') == $id ? 'selected' : '' }}>{{ $directorycategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('directorycategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('directorycategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directorySubCategory.fields.directorycategory_helper') }}</span>
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