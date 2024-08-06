<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                @can('role_create')
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success ml-3">
                    {{ __('global.create_new') }}
                </a>
                @endcan
                @can('role_delete')
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('global.delete_selected') }}
                </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Role" format="csv" />
                <livewire:excel-export model="Role" format="xlsx" />
                <livewire:excel-export model="Role" format="pdf" />
                @endif
                <div class="d-inline-block">
                    <input type="text" wire:model.debounce.300ms="search" id="SearchInput" placeholder="{{ __('global.search') }}" class="form-control" />
                </div>
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
                        <th class="w-28 text-center">
                            {{ trans('cruds.role.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.role.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.role.fields.permissions') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="{{ $role->id }}" wire:model="selected">
                            </td>
                            <td class="text-center">
                                {{ $role->id }}
                            </td>
                            <td class="text-center">
                                {{ $role->title }}
                            </td>
                            <td class="text-center">
                                @foreach($role->permissions as $key => $entry)
                                    <span class="badge bg-primary mb-1">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <div class="flex justify-center">
                                    @can('role_show')
                                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.roles.show', $role) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('role_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.roles.edit', $role) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('role_delete')
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', {{ $role->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
    </div>
</div>




    
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                
               
            </table>
        </div>
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
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush