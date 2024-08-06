@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /
            {{ trans('cruds.course.title_singular') }}
            {{ trans('global.list') }} /
        </span>
        {{ trans('global.create') }}
        {{ trans('cruds.course.title_singular') }}
    </h4>

    <div class="row">
        <div class="col-lg-9">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mb-2" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.courses.store') }}" method="POST" class="pt-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2 {{ $errors->has('title') ? 'invalid' : '' }}">

                            <label class="form-label required"
                                for="title">{{ trans('cruds.course.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" required
                                value="{{ old('title') }}">
                            <div class="validation-message">
                                {{ $errors->first('title') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.course.fields.title_helper') }}
                            </div>
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('description') ? 'invalid' : '' }}">
                            <label class="form-label required"
                                for="description">{{ trans('cruds.course.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description" required rows="4">{{ old('description') }}</textarea>
                            <div class="validation-message">{{ $errors->first('description') }}</div>
                            <div class="help-block">
                                {{ trans('cruds.course.fields.description_helper') }}
                            </div>
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('course.price') ? 'invalid' : '' }}">
                            <label class="form-label" for="price">{{ trans('cruds.course.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price"
                                value="{{ old('price') }}" step="0.01">
                            <div class="validation-message">
                                {{ $errors->first('course.price') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.course.fields.price_helper') }}
                            </div>
                        </div>

                        <div class="marketopia-zone">
                            <input type="file" name="file" class="file-input">                        
                            <div class="dz-message">
                                Thumbnail
                                <span class="note">Drop files here or click to upload</span>
                            </div>
                            <div class="dz-images" id="dz-images"></div>
                        </div>   
                        <br>
                        <div class="form-group mb-2 {{ $errors->has('course.is_published') ? 'invalid' : '' }}">
                            <label class="switch">
                                <input type="checkbox" class="switch-input" name="is_published">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="ti ti-check"></i>
                                    </span>
                                    <span class="switch-off">
                                        <i class="ti ti-x"></i>
                                    </span>
                                </span>
                                <span class="switch-label">{{ trans('cruds.course.fields.is_published') }}</span>
                            </label>
                            <div class="validation-message">
                                {{ $errors->first('course.is_published') }}
                            </div>
                        </div>
                        <button class="btn btn-primary mr-2" type="submit">
                            {{ trans('global.save') }}
                        </button>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                            {{ trans('global.cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/dropzone/dropzone.css" />
    @endpush
    @push('scripts')
        <script src="{{ asset('/') }}assets/vendor/libs/dropzone/dropzone.js"></script>
        <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
        <script src="{{ asset('js/file-upload.js') }}"></script>
    @endpush
@endsection
