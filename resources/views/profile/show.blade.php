@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /
            {{ trans('cruds.lesson.title_singular') }}
        </span>
        {{ __('global.my_profile') }}
    </h4>
    <form wire:submit.prevent="updateProfileInformation" class="w-full">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ __('global.profile_information') }}
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group px-4">
                    <label class="form-label" for="name">{{ __('global.user_name') }}</label>
                    <input class="form-control" id="name" type="text" autocomplete="name">
                    @error('state.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-group px-4">
                    <label class="form-label" for="email">{{ __('global.login_email') }}</label>
                    <input class="form-control" id="email" type="text" name="email" autocomplete="email">
                    @error('state.email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary mr-3">
                    {{ __('global.save') }}
                </button>
            </div>
        </div>
    </form>
    <hr class="mt-6 border-b-1 border-blueGray-300">
    <form class="w-full">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                {{ __('global.update') }} {{ __('global.login_password') }}
            </h5>
        </div>
        <div class="card-body">
            <div class="form-group px-4">
                <label class="form-label" for="current_password">{{ __('global.current_password') }}</label>
                <input class="form-control" id="current_password" type="password" wire:model.defer="state.current_password" autocomplete="current-password">
                @error('state.current_password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group px-4">
                <label class="form-label" for="new_password">{{ __('global.new_password') }}</label>
                <input class="form-control" id="new_password" type="password" wire:model.defer="state.password" autocomplete="new-password">
                @error('state.password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group px-4">
                <label class="form-label" for="password_confirmation">{{ __('global.confirm_password') }}</label>
                <input class="form-control" id="password_confirmation" type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary mr-3">
                {{ __('global.save') }}
            </button>
        </div>
    </div>
</form>
@endsection