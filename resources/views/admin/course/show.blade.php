@extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / 
        {{ trans('cruds.course.title_singular') }}
        {{ trans('global.list') }} /
    </span> 
    {{ trans('global.view') }}
    {{ trans('cruds.course.title_singular') }}:
    {{ trans('cruds.course.fields.id') }}
    {{ $course->id }}
</h4>   
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.id') }}
                            </th>
                            <td>
                                {{ $course->id }}
                            </td>
                        </tr>
                       
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.title') }} (AR)
                            </th>
                            <td>
                                {{ $course->translate('ar')->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.title') }} (EN)
                            </th>
                            <td>
                                {{ $course->translate('en')->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.description') }} (AR)
                            </th>
                            <td>
                                {{ $course->translate('ar')->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.description') }} (EN)
                            </th>
                            <td>
                                {{ $course->translate('en')->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.price') }}
                            </th>
                            <td>
                                {{ number_format($course->price) }} EGP
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.thumbnail') }}
                            </th>
                            <td>
                                @foreach($course->thumbnail as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.is_published') }}
                            </th>
                            <td>
                                <i class="ti {{ !$course->is_published ? 'ti-xbox-x text-danger' : 'ti-checkbox text-success' }}"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer">
            <div class="form-group mt-1">
                @can('course_edit')
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection