@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / {{ __('global.permissions_list') }} / </span>
    {{ trans('global.create') }}
    {{ trans('cruds.permission.title_singular') }}
</h4>

@livewire('permission.create')
@endsection