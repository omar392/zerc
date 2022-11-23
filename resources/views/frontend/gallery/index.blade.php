@extends('frontend.layouts.index')
@section('title', __('site.gallery-'))
@section('content')
    <!-- Page Title -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_gallery) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ __('site.gallery') }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ __('site.gallery') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- services -->
    <section class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @foreach ($gallery as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="{{ asset('dashboard/galleries/' . $item->image) }}" >
                                    <img src="{{ asset('dashboard/galleries/' . $item->image) }}" alt="{{ $item->title }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pagination-area">
                    {{ $blogs->links('vendor.pagination.custom') }}
                </div>
            </div>
    </section>
    <!-- End services -->
@endsection
