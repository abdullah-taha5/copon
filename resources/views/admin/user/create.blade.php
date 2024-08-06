@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.users_list') }} / </span>
    {{ __('global.create_new') }}
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
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group  mb-3{{ $errors->has('user.name') ? 'invalid' : '' }}">
                    <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control" type="text" name="name" id="name" required
                        value="{{ old('name') }}">
                    <div class="validation-message">
                        {{ $errors->first('user.name') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </div>
                </div>
                <div class="form-group mb-3 {{ $errors->has('user.email') ? 'invalid' : '' }}">
                    <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control" type="email" name="email" id="email" required
                        value="{{ old('email') }}">
                    <div class="validation-message">
                        {{ $errors->first('user.email') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </div>
                </div>
                <div class="form-group mb-3 {{ $errors->has('user.password') ? 'invalid' : '' }}">
                    <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                    <div class="validation-message">
                        {{ $errors->first('user.password') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.user.fields.password_helper') }}
                    </div>
                </div>
                <div class="form-group mb-3 {{ $errors->has('roles') ? 'invalid' : '' }}">
                    <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                    <select class="select2 form-control" name="roles[]">
                        @foreach ($options as $key => $value)
                            <option {{ old('roles') == $key ? 'selected' : '' }} value="{{ $key }}">
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

        </div>
        <div class="card-footer">
            <div class="form-group">
                <button class="btn btn-primary mr-2" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </div>

        </form>
    </div>
    </div>
@endsection
