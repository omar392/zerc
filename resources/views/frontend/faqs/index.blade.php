@extends('frontend.layouts.index')
@section('title', __('site.faqs-'))
@section('content')
    <!-- Page Title -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_faqs) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ __('site.faq') }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ __('site.faq') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- FAQ -->
    <div class="faq-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-content">
                        <ul class="accordion">
                            @foreach ($faqs as $item)
                                <li>
                                    <a>{{ $item->ask }}</a>
                                    <p>{!! $item->answer !!}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="pagination-area">
                {{ $faqs->links('vendor.pagination.custom') }}
            </div>
            <div class="faq-bottom">
                <h3>If you don't find your questions or need help</h3>
                <a href="{{ route('front.contact') }}">{{ __('site.contact') }}</a>
            </div>

        </div>
    </div>
    <!-- End FAQ -->
@endsection
