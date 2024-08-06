@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.permissions_list') }} / </span>
    {{ trans('global.edit') }}
    {{ trans('cruds.permission.title_singular') }}:
    {{ trans('cruds.permission.fields.id') }}
    {{ $permission->id }}
</h4>

@livewire('permission.edit', [$permission])
@endsection