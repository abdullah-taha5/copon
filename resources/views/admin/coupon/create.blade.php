@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /
            {{ trans('cruds.coupon.title_singular') }}
            {{ trans('global.list') }} /
        </span>
        {{ trans('global.create') }}
        {{ trans('cruds.coupon.title_singular') }}
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
            <form action="{{ route('admin.coupons.store') }}" method="POST" class="pt-3" enctype="multipart/form-data">
                @csrf
                
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('coupon.coupon') ? 'invalid' : '' }}">
                            <label class="form-label" for="coupon">{{ trans('cruds.coupon.fields.coupon') }}</label>
                            <input class="form-control" type="text" name="coupon" id="coupon" value="{{ old('coupon') }}">
                            <div class="validation-message">
                                {{ $errors->first('coupon.coupon') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.coupon.fields.coupon_helper') }}
                            </div>
                        </div>
                        <br>
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
                                <div class="form-group {{ $errors->has('coupon.total_views_limit') ? 'invalid' : '' }}">
                                    <label class="form-label" for="total_views_limit">{{ trans('cruds.coupon.fields.total_views_limit') }}</label>
                                    <input class="form-control" type="number" name="total_views_limit" id="total_views_limit" wire:model.defer="coupon.total_views_limit" step="1">
                                    <div class="validation-message">
                                        {{ $errors->first('coupon.total_views_limit') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.coupon.fields.total_views_limit_helper') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('coupon.daily_views_limit') ? 'invalid' : '' }}">
                                    <label class="form-label" for="daily_views_limit">{{ trans('cruds.coupon.fields.daily_views_limit') }}</label>
                                    <input class="form-control" type="number" name="daily_views_limit" id="daily_views_limit" wire:model.defer="coupon.daily_views_limit" step="1">
                                    <div class="validation-message">
                                        {{ $errors->first('coupon.daily_views_limit') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.coupon.fields.daily_views_limit_helper') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('coupon.started_at') ? 'invalid' : '' }}">
                                    <label class="form-label" for="started_at">{{ trans('cruds.coupon.fields.started_at') }}</label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" id="started_at" name="started_at">
                                    <div class="validation-message">
                                        {{ $errors->first('coupon.started_at') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.coupon.fields.started_at_helper') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('coupon.expire_at') ? 'invalid' : '' }}">
                                    <label class="form-label" for="expire_at">{{ trans('cruds.coupon.fields.expire_at') }}</label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" id="expire_at" name="expire_at">
                                    <div class="validation-message">
                                        {{ $errors->first('coupon.expire_at') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.coupon.fields.expire_at_helper') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="btn btn-primary mr-2" type="submit">
                                {{ trans('global.save') }}
                            </button>
                            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
                                {{ trans('global.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
    @endpush
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    @endpush
@endsection
{{-- @extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.create') }}
                    {{ trans('cruds.coupon.title_singular') }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('coupon.create')
        </div>
    </div>
</div>
@endsection --}}