@extends('layouts.student')
@section('content')
    <div class="card p-0 mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
            <div class="app-academy-md-25 card-body py-0">
                <img src="{{ asset('assets/img/illustrations/bulb-light.png') }}"
                    class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                    data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png"
                    height="90">
            </div>
            <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                    {{ __('student.enter_coupon_code_to') }}
                    <span class="text-primary fw-medium text-nowrap">{{ __('student.open_course') }}</span>.
                </h3>

                <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                    <input type="search" placeholder="Find your course" class="form-control me-2">
                    <button type="submit" class="btn btn-primary btn-icon waves-effect waves-light"><i
                            class="ti ti-search"></i></button>
                </div>
            </div>
            <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img src="{{ asset('assets/img/illustrations/pencil-rocket.png') }}" alt="pencil rocket" height="188"
                    class="scaleX-n1-rtl">
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1">{{ __('student.my_courses') }}</h5>
                <p class="text-muted mb-0">{{ __('student.total') }} {{ $coupons_count }} {{ __('student.course_you_have_purchased') }} </p>
            </div>
        </div>
        <div class="card-body">
            @if (auth()->user()->coupons != null && count(auth()->user()->coupons) > 0)
                <div class="row gy-4 mb-4">
                    @foreach ($coupons as $coupon)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <a href="app-academy-course-details.html">
                                        @foreach ($coupon->course->thumbnail as $key => $entry)
                                            <img class="img-fluid" src="{{ $entry['url'] }}" alt="{{ $entry['name'] }}" />
                                        @endforeach
                                    </a>
                                </div>
                                <div class="card-body p-3 pt-2">

                                    <a href="app-academy-course-details.html"
                                        class="h5">{{ $coupon->course->title }}</a>
                                    <p class="mt-2">
                                        {{ $coupon->course->description }}
                                    </p>


                                    <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                        <a class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                            href="app-academy-course-details.html">
                                            <i
                                                class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl me-2 mt-n1 ti-sm"></i><span>Start
                                                Over</span>
                                        </a>
                                        <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                            href="app-academy-course-details.html">
                                            <span class="me-2">Continue</span><i
                                                class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
            @endif
            {{--  <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                <ul class="pagination">
                    <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0);"><i
                                class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0);">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">5</a>
                    </li>
                    <li class="page-item next">
                        <a class="page-link" href="javascript:void(0);"><i
                                class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </div>
    @push('scripts')
    @endpush
@endsection
