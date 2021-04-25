@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.directoryContent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.directory-contents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ministry_id">{{ trans('cruds.directoryContent.fields.ministry') }}</label>
                <select class="form-control select2 {{ $errors->has('ministry') ? 'is-invalid' : '' }}" name="ministry_id" id="ministry_id">
                    @foreach($ministries as $id => $entry)
                        <option value="{{ $id }}" {{ old('ministry_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ministry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ministry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.ministry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.directoryContent.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.directoryContent.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.directoryContent.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DirectoryContent::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Hidden') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <label for="detailinformation">{{ trans('cruds.directoryContent.fields.detailinformation') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('detailinformation') ? 'is-invalid' : '' }}" name="detailinformation" id="detailinformation">{!! old('detailinformation') !!}</textarea>
                @if($errors->has('detailinformation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detailinformation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.detailinformation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_information">{{ trans('cruds.directoryContent.fields.contact_information') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('contact_information') ? 'is-invalid' : '' }}" name="contact_information" id="contact_information">{!! old('contact_information') !!}</textarea>
                @if($errors->has('contact_information'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_information') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.contact_information_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.directoryContent.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tags }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="files">{{ trans('cruds.directoryContent.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.directoryContent.fields.files_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.directory-contents.storeCKEditorImages') }}', true);
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

<script>
    var uploadedFilesMap = {}
Dropzone.options.filesDropzone = {
    url: '{{ route('admin.directory-contents.storeMedia') }}',
    maxFilesize: 1000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($directoryContent) && $directoryContent->files)
          var files =
            {!! json_encode($directoryContent->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
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