@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ministryContent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ministry-contents.update", [$ministryContent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sub_categories">{{ trans('cruds.ministryContent.fields.sub_categories') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sub_categories') ? 'is-invalid' : '' }}" name="sub_categories[]" id="sub_categories" multiple>
                    @foreach($sub_categories as $id => $sub_categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('sub_categories', [])) || $ministryContent->sub_categories->contains($id)) ? 'selected' : '' }}>{{ $sub_categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.sub_categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.ministryContent.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $ministryContent->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.ministryContent.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $ministryContent->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detailinformation">{{ trans('cruds.ministryContent.fields.detailinformation') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('detailinformation') ? 'is-invalid' : '' }}" name="detailinformation" id="detailinformation">{!! old('detailinformation', $ministryContent->detailinformation) !!}</textarea>
                @if($errors->has('detailinformation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detailinformation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.detailinformation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_information">{{ trans('cruds.ministryContent.fields.contact_information') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('contact_information') ? 'is-invalid' : '' }}" name="contact_information" id="contact_information">{!! old('contact_information', $ministryContent->contact_information) !!}</textarea>
                @if($errors->has('contact_information'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_information') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.contact_information_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.ministryContent.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\MinistryContent::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $ministryContent->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ministryContent.fields.status_helper') }}</span>
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
                xhr.open('POST', '/admin/ministry-contents/ckmedia', true);
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
                data.append('crud_id', '{{ $ministryContent->id ?? 0 }}');
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