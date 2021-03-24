@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.directorySubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.directory-sub-categories.update", [$directorySubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.directorySubCategory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $directorySubCategory->title) }}">
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
                        <option value="{{ $key }}" {{ old('status', $directorySubCategory->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $id }}" {{ (old('directorycategory_id') ? old('directorycategory_id') : $directorySubCategory->directorycategory->id ?? '') == $id ? 'selected' : '' }}>{{ $directorycategory }}</option>
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
                <label for="contents">{{ trans('cruds.directorySubCategory.fields.content') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('contents') ? 'is-invalid' : '' }}" name="contents[]" id="contents" multiple>
                    @foreach($contents as $id => $content)
                        <option value="{{ $id }}" {{ (in_array($id, old('contents', [])) || $directorySubCategory->contents->contains($id)) ? 'selected' : '' }}>{{ $content }}</option>
                    @endforeach
                </select>
                @if($errors->has('contents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directorySubCategory.fields.content_helper') }}</span>
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