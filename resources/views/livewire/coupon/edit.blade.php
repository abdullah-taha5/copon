<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('coupon.coupon') ? 'invalid' : '' }}">
        <label class="form-label" for="coupon">{{ trans('cruds.coupon.fields.coupon') }}</label>
        <input class="form-control" type="text" name="coupon" id="coupon" wire:model.defer="coupon.coupon">
        <div class="validation-message">
            {{ $errors->first('coupon.coupon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.coupon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.total_views_limit') ? 'invalid' : '' }}">
        <label class="form-label" for="total_views_limit">{{ trans('cruds.coupon.fields.total_views_limit') }}</label>
        <input class="form-control" type="number" name="total_views_limit" id="total_views_limit" wire:model.defer="coupon.total_views_limit" step="1">
        <div class="validation-message">
            {{ $errors->first('coupon.total_views_limit') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.total_views_limit_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.daily_views_limit') ? 'invalid' : '' }}">
        <label class="form-label" for="daily_views_limit">{{ trans('cruds.coupon.fields.daily_views_limit') }}</label>
        <input class="form-control" type="number" name="daily_views_limit" id="daily_views_limit" wire:model.defer="coupon.daily_views_limit" step="1">
        <div class="validation-message">
            {{ $errors->first('coupon.daily_views_limit') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.daily_views_limit_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.started_at') ? 'invalid' : '' }}">
        <label class="form-label" for="started_at">{{ trans('cruds.coupon.fields.started_at') }}</label>
        <x-date-picker class="form-control" wire:model="coupon.started_at" id="started_at" name="started_at" />
        <div class="validation-message">
            {{ $errors->first('coupon.started_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.started_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.expire_at') ? 'invalid' : '' }}">
        <label class="form-label" for="expire_at">{{ trans('cruds.coupon.fields.expire_at') }}</label>
        <x-date-picker class="form-control" wire:model="coupon.expire_at" id="expire_at" name="expire_at" />
        <div class="validation-message">
            {{ $errors->first('coupon.expire_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.expire_at_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>