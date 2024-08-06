<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                @can('permission_create')
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success ml-3">
                    {{ __('global.create_new') }}
                </a>
                @endcan
                @can('permission_delete')
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('global.delete_selected') }}
                </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Permission" format="csv" />
                <livewire:excel-export model="Permission" format="xlsx" />
                <livewire:excel-export model="Permission" format="pdf" />
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
                        <th class="w-9">
                        </th>
                        <th class="w-28 text-center">
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.permission.fields.title') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="{{ $permission->id }}" wire:model="selected">
                            </td>
                            <td class="text-center">
                                {{ $permission->id }}
                            </td>
                            <td class="text-center">
                                {{ $permission->title }}
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @can('permission_show')
                                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.permissions.show', $permission) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('permission_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.permissions.edit', $permission) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('permission_delete')
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', {{ $permission->id }})" wire:loading.attr="disabled">
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
            {{ $permissions->links() }}
        </div>
    </div>
</div>
{{-- <div>
   

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                   
                </thead>
                
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
            {{ $permissions->links() }}
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
@endpush --}}