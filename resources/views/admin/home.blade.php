@extends('layouts.admin')
@section('content')
    {{-- <div class="card">
        <div class="card-body">
            @if (auth()->user()->is_student)
                <form action="{{ route('admin.coupons.use') }}" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('coupon') ? 'invalid' : '' }}">
                        <label class="form-label required" for="coupon">{{ trans('cruds.coupon.fields.coupon') }}</label>
                        <input class="form-control" type="text" name="coupon" id="coupon" required>
                        <div class="validation-message">
                            {{ $errors->first('coupon') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.coupon.fields.coupon_helper') }}
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <button class="btn btn-primary mr-2" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
                
                @if (auth()->user()->coupons != null && count(auth()->user()->coupons) > 0) 
                <hr>
                <div class="row">
                    @foreach ($coupons as $coupon)
                    <div class="col-lg-3">
                        <a href="{{ route('admin.courses.single', $coupon->course) }}" class="card" disabled >
                            @foreach($coupon->course->thumbnail as $key => $entry)
                            <img class="card-img-top" src="{{ $entry['url'] }}" alt="{{ $entry['name'] }}" height="210px" title="{{ $entry['name'] }}">
                            @endforeach
                            <div class="card-body">
                              <h5 class="card-title">{{ $coupon->course->title }}</h5>
                              <p class="card-text">
                                {{ $coupon->course->description }}
                              </p>
                            </div>
                            <div class="information d-flex justify-content-between align-content-center">
                                @if($coupon->daily_views_limit != null)
                                <div class="daily_limit w-50 bg-primary text-center text-white fw-bold">Daily Limit : {{ $coupon->daily_views_limit }} / {{ $coupon->total_counter_count }}</div>
                                @endif
                                @if($coupon->total_views_limit != null)
                                <div class="total_limit w-50 bg-primary text-center text-white fw-bold" >total views : {{ $coupon->total_views_limit }} / {{ $coupon->daily_counter_count }}</div>
                                @endif
                            </div>
                            @if($coupon->expire_at != null)
                            <div class="total_limit w-100 pt-2 bg-primary text-center text-white fw-bold" >Expire : {{ date('d-m-Y / h:i A', strtotime($coupon->expire_at)) }}</div>
                            @endif
                          </a>
                    </div> 
                    @endforeach
                </div>
                   
                @endif
                
            @endif
        </div>
    </div> --}}

    @push('scripts')
    @endpush
@endsection
