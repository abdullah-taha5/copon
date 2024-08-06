@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} / 
            {{ trans('cruds.role.title_singular') }}
            {{ trans('global.list') }}
        </span>
        {{ trans('global.edit') }}
        {{ trans('cruds.role.title_singular') }}:
        {{ trans('cruds.role.fields.id') }}
        {{ $role->id }}

    </h4>

    <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="pt-3">
        @csrf
        @method('PATCH')
        <div class="form-group {{ $errors->has('title') ? 'invalid' : '' }}">
            <label class="form-label required" for="title">{{ trans('cruds.role.fields.title') }}</label>
            <input class="form-control" type="text" name="title" id="title" required value="{{ $role->title }}">
            <div class="validation-message">
                {{ $errors->first('title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.role.fields.title_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('permissions') ? 'invalid' : '' }}">
            <label class="form-label required"
                for="course">{{ trans('cruds.role.fields.permissions') }}</label>
            <select id="select2Basic" class="select2 form-select form-select-lg" name="permissions[]" data-allow-clear="true" multiple>
                @foreach ($permissions as $key => $value)
                    <option value="{{ $key }}" {{  in_array($key, $selected) ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
            <div class="validation-message">
                {{ $errors->first('permissions') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.role.fields.permissions_helper') }}
            </div>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-primary mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </form>
    
@endsection