@extends('frontend.layouts.index')
@section('content')


        <!-- Error -->
        <div class="error-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="error-content">
                            <h1>404</h1>
                            <h2>{{ __('site.404') }}</h2>
                            <p>{{ __('site.not') }}</p>
                            <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Error -->


@endsection
