@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.permissions_list') }} / </span>
    {{ trans('global.view') }}
    {{ trans('cruds.permission.title_singular') }}:
    {{ trans('cruds.permission.fields.id') }}
    {{ $permission->id }}
</h4>
    <div class="card">
        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.id') }}
                            </th>
                            <td>
                                {{ $permission->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.title') }}
                            </th>
                            <td>
                                {{ $permission->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group mb-2">
                @can('permission_edit')
                    <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-primary mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection