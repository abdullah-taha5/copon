@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /</span> 
        {{ __('global.permissions_list') }}
    </h4>       
    @livewire('permission.index')
@endsection