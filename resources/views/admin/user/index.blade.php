@extends('layouts.admin')
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ env('APP_NAME') }} /</span> 
        {{ __('global.users_list') }}
    </h4>   
    @livewire('user.index')
@endsection
{{-- <div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.user.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('user_create')
                    <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        

    </div>
</div> --}}
