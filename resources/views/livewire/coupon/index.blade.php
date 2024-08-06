<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                @can('coupon_create')
                <a href="{{ route('admin.coupons.create') }}" class="btn btn-success ml-3">
                    {{ __('global.create_new') }}
                </a>
                @endcan
                @can('coupon_delete')
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('global.delete_selected') }}
                </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Coupon" format="csv" />
                <livewire:excel-export model="Coupon" format="xlsx" />
                <livewire:excel-export model="Coupon" format="pdf" />
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
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.coupon.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.coupon') }}
                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.total_views_limit') }}
                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.daily_views_limit') }}
                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.started_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.expire_at') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $coupon->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $coupon->id }}
                            </td>
                            <td>
                                {{ $coupon->coupon }}
                            </td>
                            <td>
                                {{ $coupon->total_views_limit }}
                            </td>
                            <td>
                                {{ $coupon->daily_views_limit }}
                            </td>
                            <td>
                                {{ $coupon->started_at }}
                            </td>
                            <td>
                                {{ $coupon->expire_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('coupon_show')
                                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.coupons.show', $coupon) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('coupon_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.coupons.edit', $coupon) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('coupon_delete')
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', {{ $coupon->id }})" wire:loading.attr="disabled">
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
            {{ $coupons->links() }}
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