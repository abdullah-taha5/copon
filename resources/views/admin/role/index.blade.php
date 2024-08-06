@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} / </span>
        {{ trans('cruds.role.title_singular') }}
        {{ trans('global.list') }}
    </h4>
    @livewire('role.index')
@endsection