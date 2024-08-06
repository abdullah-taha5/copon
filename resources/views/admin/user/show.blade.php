@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.users_list') }} / </span>
    {{ trans('global.view') }}
    {{ trans('cruds.user.title_singular') }}:
    {{ trans('cruds.user.fields.id') }}
    {{ $user->id }}
</h4>
<div class="card">
    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $user->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            @if ( $user->email_verified_at != null)
                                {{ $user->email_verified_at }}
                            @else
                            <span class="badge bg-danger">{{ __('global.not_verified') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $entry)
                                <span class="badge bg-primary">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group mt-2 mb-2">
            @can('user_edit')
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-2">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection