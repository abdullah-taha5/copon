@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.users_list') }} / </span>
        {{ __('global.edit') }} : {{ $user->name }}
    </h4>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="pt-3">
                @method('PATCH')
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'invalid' : '' }}">
                    <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control" type="text" name="name" id="name" required
                        value="{{ $user->name }}">
                    <div class="validation-message">
                        {{ $errors->first('name') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'invalid' : '' }}">
                    <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control" type="email" name="email" id="email" required
                        value="{{ $user->email }}">
                    <div class="validation-message">
                        {{ $errors->first('email') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'invalid' : '' }}">
                    <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <div class="validation-message">
                        {{ $errors->first('password') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.password_helper') }}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">

                    <div class="form-group mb-3 {{ $errors->has('roles') ? 'invalid' : '' }}">
                        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                        <select class="select2 form-control" name="roles[]" multiple>
                            @foreach ($options as $key => $value)
                                <option {{ in_array($key, $roles) ? 'selected' : '' }} value="{{ $key }}">
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="validation-message">
                            {{ $errors->first('roles') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
                        </div>
                    </div>

                    <div class="validation-message">
                        {{ $errors->first('roles') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.roles_helper') }}
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary mr-2" type="submit">
                        {{ trans('global.save') }}
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
