<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                @can('course_create')
                <a href="{{ route('admin.courses.create') }}" class="btn btn-success ml-3">
                    {{ __('global.create_new') }}
                </a>
                @endcan
                @can('course_delete')
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('global.delete_selected') }}
                </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Course" format="csv" />
                <livewire:excel-export model="Course" format="xlsx" />
                <livewire:excel-export model="Course" format="pdf" />
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
                        <th class="text-center w-28">
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                       
                        <th class="text-center">
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.course.fields.price') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.course.fields.thumbnail') }}
                        </th>
                        <th class="text-center">
                            {{ trans('cruds.course.fields.is_published') }}
                        </th>
                        <th class="text-center">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="{{ $course->id }}" wire:model="selected">
                            </td>
                            <td class="text-center">
                                {{ $course->id }}
                            </td>
                            <td class="text-center">
                                {{ $course->title }}
                            </td>
                            <td class="text-center">
                                {{ $course->description }}
                            </td>
                            <td class="text-center">
                                {{ number_format($course->price) }} EGP
                            </td>
                            <td class="text-center">
                                @foreach($course->thumbnail as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td class="text-center">
                                
                                <i class="ti {{ !$course->is_published ? 'ti-xbox-x text-danger' : 'ti-checkbox text-success' }}"></i>
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @can('course_show')
                                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.courses.show', $course) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('course_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.courses.edit', $course) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('course_delete')
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', {{ $course->id }})" wire:loading.attr="disabled">
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
            {{ $courses->links() }}

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