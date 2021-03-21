@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.directoryContent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.directory-contents.update", [$directoryContent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.directoryContent.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $directoryContent->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.directoryContent.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $directoryContent->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detailinformation">{{ trans('cruds.directoryContent.fields.detailinformation') }}</label>
                <input class="form-control {{ $errors->has('detailinformation') ? 'is-invalid' : '' }}" type="text" name="detailinformation" id="detailinformation" value="{{ old('detailinformation', $directoryContent->detailinformation) }}">
                @if($errors->has('detailinformation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detailinformation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.detailinformation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="directorysubcategory_id">{{ trans('cruds.directoryContent.fields.directorysubcategory') }}</label>
                <select class="form-control select2 {{ $errors->has('directorysubcategory') ? 'is-invalid' : '' }}" name="directorysubcategory_id" id="directorysubcategory_id">
                    @foreach($directorysubcategories as $id => $directorysubcategory)
                        <option value="{{ $id }}" {{ (old('directorysubcategory_id') ? old('directorysubcategory_id') : $directoryContent->directorysubcategory->id ?? '') == $id ? 'selected' : '' }}>{{ $directorysubcategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('directorysubcategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('directorysubcategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.directorysubcategory_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.directoryContent.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DirectoryContent::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $directoryContent->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.status_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/directory-contents/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $directoryContent->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection