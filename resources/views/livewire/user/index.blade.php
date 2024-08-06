<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                @can('user_create')
                <a href="{{ route('admin.users.create') }}" class="btn btn-success ml-3">
                    {{ __('global.create_new') }}
                </a>
                @endcan
                @can('user_delete')
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('global.delete_selected') }}
                </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="User" format="csv" />
                <livewire:excel-export model="User" format="xlsx" />
                <livewire:excel-export model="User" format="pdf" />
                @endif
                <div class="d-inline-block">
                    <input type="text" wire:model.debounce.300ms="search" id="SearchInput" placeholder="{{ __('global.search') }}" class="form-control" />
                </div>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="w-9 text-center">
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                       
                        <th class="text-center">
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                       
                        <th> 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                            </td>
                            <td class="text-center">
                                {{ $user->id }}
                            </td>
                            <td class="text-center">
                                {{ $user->name }}
                            </td>
                            <td class="text-center">
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                           
                            <td class="text-center">
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge bg-label-primary me-1">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                           
                            <td>
                                <div class="flex justify-center">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.users.show', $user) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>  
    </div>
</div>


{{-- <div>
    <div class="card-datatable table-responsive">
        <div class="w-full sm:w-1/2">
            Per page:
            

           

          



        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
          
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>


    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/app-user-list.js') }}"></script>
@endpush --}}