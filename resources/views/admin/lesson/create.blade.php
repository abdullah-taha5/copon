@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /
            {{ trans('cruds.lesson.title_singular') }}
            {{ trans('global.list') }} /
        </span>
        {{ trans('global.create') }}
        {{ trans('cruds.lesson.title_singular') }}
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
            <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="nav-tabs-shadow nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#ar-lang" aria-controls="ar-lang" aria-selected="true">عربي</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#en-lang" aria-controls="en-lang" aria-selected="false">English</button>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="ar-lang" role="tabpanel">
                            <div class="form-group mb-2 {{ $errors->has('title_ar') ? 'invalid' : '' }}">
                                <label class="form-label required" for="title_ar">{{ trans('cruds.course.fields.title') }}
                                    (عربي)</label>
                                <input class="form-control" type="text" name="title_ar" id="title_ar" required
                                    value="{{ old('title_ar') }}">
                                <div class="validation-message">
                                    {{ $errors->first('title_ar') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.title_helper') }}
                                </div>
                            </div>
                            <div class="form-group mb-2 {{ $errors->has('short_text_ar') ? 'invalid' : '' }}">
                                <label class="form-label required"
                                    for="short_text_ar">{{ trans('cruds.lesson.fields.short_text') }} (عربي)</label>
                                <textarea class="form-control" name="short_text_ar" id="short_text_ar" required rows="4">{{ old('short_text_ar') }}</textarea>
                                <div class="validation-message">
                                    {{ $errors->first('short_text_ar') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.short_text_helper') }}
                                </div>
                            </div>
                            <div class="form-group mb-2 {{ $errors->has('long_text_ar') ? 'invalid' : '' }}">
                                <label class="form-label required"
                                    for="long_text_ar">{{ trans('cruds.lesson.fields.short_text') }} (عربي)</label>
                                <textarea class="form-control" name="long_text_ar" id="long_text_ar" required rows="6">{{ old('long_text_ar') }}</textarea>
                                <div class="validation-message">
                                    {{ $errors->first('long_text_ar') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.short_text_helper') }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en-lang" role="tabpanel">
                            <div class="form-group mb-2 {{ $errors->has('title_en') ? 'invalid' : '' }}">
                                <label class="form-label required" for="title_en">{{ trans('cruds.lesson.fields.title') }}
                                    (English)</label>
                                <input class="form-control" type="text" name="title_en" id="title_en" required
                                    value="{{ old('title_en') }}">
                                <div class="validation-message">
                                    {{ $errors->first('title_en') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.title_helper') }}
                                </div>
                            </div>
                            <div class="form-group mb-2 {{ $errors->has('short_text_en') ? 'invalid' : '' }}">
                                <label class="form-label required"
                                    for="description_ar">{{ trans('cruds.lesson.fields.short_text') }} (English)</label>
                                <textarea class="form-control" name="short_text_en" id="short_text_en" required rows="4">{{ old('short_text_en') }}</textarea>
                                <div class="validation-message">
                                    {{ $errors->first('short_text_en') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.short_text_helper') }}
                                </div>
                            </div>
                            <div class="form-group mb-2 {{ $errors->has('long_text_en') ? 'invalid' : '' }}">
                                <label class="form-label required"
                                    for="long_text_en">{{ trans('cruds.lesson.fields.short_text') }} (عربي)</label>
                                <textarea class="form-control" name="long_text_en" id="long_text_en" required rows="6">{{ old('long_text_en') }}</textarea>
                                <div class="validation-message">
                                    {{ $errors->first('long_text_en') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.short_text_helper') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('course_id') ? 'invalid' : '' }}">
                            <label class="form-label required"
                                for="course">{{ trans('cruds.lesson.fields.course') }}</label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" name="course_id" data-allow-clear="true">
                                @foreach ($courses as $key => $value)
                                    <option value="{{ $key }}" {{ $key == old('course_id') ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="validation-message">
                                {{ $errors->first('course_id') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.lesson.fields.course_helper') }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div
                                    class="marketopia-zone {{ $errors->has('mediaCollections.lesson_thumbnail') ? 'invalid' : '' }}">
                                    <input type="file" name="thumbnail" class="file-input">
                                    <div class="dz-message">
                                        {{ trans('cruds.lesson.fields.thumbnail') }}
                                        <span class="note">Drop files here or click to upload</span>
                                    </div>
                                    <div class="dz-images" id="dz-images"></div>
                                </div>
                                <div class="validation-message">
                                    {{ $errors->first('mediaCollections.lesson_thumbnail') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.thumbnail_helper') }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="marketopia-zone {{ $errors->has('mediaCollections.lesson_video') ? 'invalid' : '' }}">
                                    <input type="file" name="video" class="file-input">
                                    <div class="dz-message">
                                        {{ trans('cruds.lesson.fields.video') }}
                                        <span class="note">Drop files here or click to upload</span>
                                    </div>
                                    <div class="dz-images" id="dz-images"></div>
                                </div>
                                <div class="validation-message">
                                    {{ $errors->first('mediaCollections.lesson_video') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.lesson.fields.video_helper') }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group {{ $errors->has('iframe') ? 'invalid' : '' }}">
                            <label class="form-label" for="iframe">{{ trans('cruds.lesson.fields.iframe') }}</label>
                            <textarea class="form-control" name="iframe" id="iframe" rows="4">{{ old('iframe') }}</textarea>
                            <div class="validation-message">
                                {{ $errors->first('iframe') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.lesson.fields.position_helper') }}
                            </div>
                        </div>
                        <br>
                        <div class="form-group {{ $errors->has('position') ? 'invalid' : '' }}">
                            <label class="form-label" for="position">{{ trans('cruds.lesson.fields.position') }}</label>
                            <input class="form-control" type="number" name="position" id="position"
                                value="{{ old('position') }}" step="1">
                            <div class="validation-message">
                                {{ $errors->first('position') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.lesson.fields.position_helper') }}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group {{ $errors->has('lesson.is_published') ? 'invalid' : '' }}">

                            <label class="switch switch-primary">
                                <input type="checkbox" class="switch-input" checked="" name="is_published"
                                    id="is_published">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="ti ti-check"></i>
                                    </span>
                                    <span class="switch-off">
                                        <i class="ti ti-x"></i>
                                    </span>
                                </span>
                                <span class="switch-label">{{ trans('cruds.lesson.fields.is_published') }}</span>
                            </label>
                            <div class="validation-message">
                                {{ $errors->first('is_published') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.lesson.fields.is_published_helper') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="btn btn-primary mr-2" type="submit">
                                {{ trans('global.save') }}
                            </button>
                            <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">
                                {{ trans('global.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
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
