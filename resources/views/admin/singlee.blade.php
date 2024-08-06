@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            @foreach ($course->lessons as $lesson)
            <div class="card">
                <div class="card-body">
                    @if ($lesson->iframe != null)
                        {!! $lesson->iframe !!}
                    @endif
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    @push('styles')
    <style>
        iframe {
            width: 100%;
        }
    </style>
    @endpush
@endsection
