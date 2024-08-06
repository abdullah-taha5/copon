@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.coupon.title_singular') }}:
                    {{ trans('cruds.coupon.fields.id') }}
                    {{ $coupon->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.id') }}
                            </th>
                            <td>
                                {{ $coupon->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.coupon') }}
                            </th>
                            <td>
                                {{ $coupon->coupon }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.total_views_limit') }}
                            </th>
                            <td>
                                {{ $coupon->total_views_limit }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.daily_views_limit') }}
                            </th>
                            <td>
                                {{ $coupon->daily_views_limit }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.started_at') }}
                            </th>
                            <td>
                                {{ $coupon->started_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.coupon.fields.expire_at') }}
                            </th>
                            <td>
                                {{ $coupon->expire_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('coupon_edit')
                    <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection