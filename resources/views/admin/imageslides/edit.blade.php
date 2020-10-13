@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.imageslide.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.imageslides.update", [$imageslide->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.imageslide.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $imageslide->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.imageslide.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="page_id">{{ trans('cruds.imageslide.fields.page') }}</label>
                <select class="form-control select2 {{ $errors->has('page') ? 'is-invalid' : '' }}" name="page_id" id="page_id">
                    @foreach($pages as $id => $page)
                        <option value="{{ $id }}" {{ (old('page_id') ? old('page_id') : $imageslide->page->id ?? '') == $id ? 'selected' : '' }}>{{ $page }}</option>
                    @endforeach
                </select>
                @if($errors->has('page'))
                    <div class="invalid-feedback">
                        {{ $errors->first('page') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.page_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.imageslide.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $imageslide->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="firstbutton">{{ trans('cruds.imageslide.fields.firstbutton') }}</label>
                <input class="form-control {{ $errors->has('firstbutton') ? 'is-invalid' : '' }}" type="text" name="firstbutton" id="firstbutton" value="{{ old('firstbutton', $imageslide->firstbutton) }}">
                @if($errors->has('firstbutton'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstbutton') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.firstbutton_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="firstbutton_link">{{ trans('cruds.imageslide.fields.firstbutton_link') }}</label>
                <input class="form-control {{ $errors->has('firstbutton_link') ? 'is-invalid' : '' }}" type="text" name="firstbutton_link" id="firstbutton_link" value="{{ old('firstbutton_link', $imageslide->firstbutton_link) }}">
                @if($errors->has('firstbutton_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstbutton_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.firstbutton_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secondbutton">{{ trans('cruds.imageslide.fields.secondbutton') }}</label>
                <input class="form-control {{ $errors->has('secondbutton') ? 'is-invalid' : '' }}" type="text" name="secondbutton" id="secondbutton" value="{{ old('secondbutton', $imageslide->secondbutton) }}">
                @if($errors->has('secondbutton'))
                    <div class="invalid-feedback">
                        {{ $errors->first('secondbutton') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.secondbutton_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secondbutton_link">{{ trans('cruds.imageslide.fields.secondbutton_link') }}</label>
                <input class="form-control {{ $errors->has('secondbutton_link') ? 'is-invalid' : '' }}" type="text" name="secondbutton_link" id="secondbutton_link" value="{{ old('secondbutton_link', $imageslide->secondbutton_link) }}">
                @if($errors->has('secondbutton_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('secondbutton_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.secondbutton_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.imageslide.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Imageslide::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $imageslide->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.imageslide.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.imageslides.storeMedia') }}',
    maxFilesize: 100, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($imageslide) && $imageslide->image)
      var file = {!! json_encode($imageslide->image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection