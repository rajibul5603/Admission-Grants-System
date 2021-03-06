@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.document.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.documents.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="app_number_id">{{ trans('cruds.document.fields.app_number') }}</label>
                            <select class="form-control select2" name="app_number_id" id="app_number_id">
                                @foreach($app_numbers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('app_number_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('app_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('app_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.app_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="userid">{{ trans('cruds.document.fields.userid') }}</label>
                            <input class="form-control" type="text" name="userid" id="userid" value="{{ old('userid', '') }}" required>
                            @if($errors->has('userid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('userid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.userid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.document.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sign">{{ trans('cruds.document.fields.sign') }}</label>
                            <div class="needsclick dropzone" id="sign-dropzone">
                            </div>
                            @if($errors->has('sign'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sign') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.sign_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="brid_copy">{{ trans('cruds.document.fields.brid_copy') }}</label>
                            <div class="needsclick dropzone" id="brid_copy-dropzone">
                            </div>
                            @if($errors->has('brid_copy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('brid_copy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.brid_copy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="nid_copy">{{ trans('cruds.document.fields.nid_copy') }}</label>
                            <div class="needsclick dropzone" id="nid_copy-dropzone">
                            </div>
                            @if($errors->has('nid_copy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nid_copy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.nid_copy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_result_copy">{{ trans('cruds.document.fields.last_result_copy') }}</label>
                            <div class="needsclick dropzone" id="last_result_copy-dropzone">
                            </div>
                            @if($errors->has('last_result_copy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_result_copy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.last_result_copy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="institute_confirmation_letter">{{ trans('cruds.document.fields.institute_confirmation_letter') }}</label>
                            <div class="needsclick dropzone" id="institute_confirmation_letter-dropzone">
                            </div>
                            @if($errors->has('institute_confirmation_letter'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('institute_confirmation_letter') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.institute_confirmation_letter_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="medical_certificate">{{ trans('cruds.document.fields.medical_certificate') }}</label>
                            <div class="needsclick dropzone" id="medical_certificate-dropzone">
                            </div>
                            @if($errors->has('medical_certificate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('medical_certificate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.medical_certificate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="govt_office_certificate">{{ trans('cruds.document.fields.govt_office_certificate') }}</label>
                            <div class="needsclick dropzone" id="govt_office_certificate-dropzone">
                            </div>
                            @if($errors->has('govt_office_certificate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('govt_office_certificate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.govt_office_certificate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="land_certificate">{{ trans('cruds.document.fields.land_certificate') }}</label>
                            <div class="needsclick dropzone" id="land_certificate-dropzone">
                            </div>
                            @if($errors->has('land_certificate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('land_certificate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.land_certificate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 300,
      height: 300
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->photo)
      var file = {!! json_encode($document->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.signDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 300,
      height: 80
    },
    success: function (file, response) {
      $('form').find('input[name="sign"]').remove()
      $('form').append('<input type="hidden" name="sign" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="sign"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->sign)
      var file = {!! json_encode($document->sign) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="sign" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.bridCopyDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 200, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200,
      width: 500,
      height: 500
    },
    success: function (file, response) {
      $('form').find('input[name="brid_copy"]').remove()
      $('form').append('<input type="hidden" name="brid_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="brid_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->brid_copy)
      var file = {!! json_encode($document->brid_copy) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="brid_copy" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.nidCopyDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="nid_copy"]').remove()
      $('form').append('<input type="hidden" name="nid_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="nid_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->nid_copy)
      var file = {!! json_encode($document->nid_copy) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="nid_copy" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.lastResultCopyDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1000,
      height: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="last_result_copy"]').remove()
      $('form').append('<input type="hidden" name="last_result_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="last_result_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->last_result_copy)
      var file = {!! json_encode($document->last_result_copy) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="last_result_copy" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.instituteConfirmationLetterDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 200, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200,
      width: 500,
      height: 500
    },
    success: function (file, response) {
      $('form').find('input[name="institute_confirmation_letter"]').remove()
      $('form').append('<input type="hidden" name="institute_confirmation_letter" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="institute_confirmation_letter"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->institute_confirmation_letter)
      var file = {!! json_encode($document->institute_confirmation_letter) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="institute_confirmation_letter" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.medicalCertificateDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="medical_certificate"]').remove()
      $('form').append('<input type="hidden" name="medical_certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="medical_certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->medical_certificate)
      var file = {!! json_encode($document->medical_certificate) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="medical_certificate" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.govtOfficeCertificateDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1000,
      height: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="govt_office_certificate"]').remove()
      $('form').append('<input type="hidden" name="govt_office_certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="govt_office_certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->govt_office_certificate)
      var file = {!! json_encode($document->govt_office_certificate) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="govt_office_certificate" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.landCertificateDropzone = {
    url: '{{ route('frontend.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="land_certificate"]').remove()
      $('form').append('<input type="hidden" name="land_certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="land_certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->land_certificate)
      var file = {!! json_encode($document->land_certificate) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="land_certificate" value="' + file.file_name + '">')
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