@extends('frontend.layouts.index')
@section('title', __('site.blog-'))
@section('content')

    <!-- Page Title -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_blog) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ __('site.blog') }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ __('site.blog') }}
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
                @foreach ($blogs as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="{{ route('front.blog.details', [str_replace(' ', '-', $item->url)]) }}">
                                    <img src="{{ asset('dashboard/blogs/' . $item->image) }}" alt="{{ $item->title }}">
                                </a>
                            </div>
                            <span> {{ $item->created_at->format('d F Y') }}</span>
                            <h3>
                                <a href="{{ route('front.blog.details', [str_replace(' ', '-', $item->url)]) }}">{{ $item->title }} </a>
                            </h3>
                            <div class="cmn-link">
                                <a href="{{ route('front.blog.details', [str_replace(' ', '-', $item->url)]) }}">
                                    <i class="flaticon-right-arrow one"></i>
                                    {{ __('site.more') }}
                                    <i class="flaticon-right-arrow two"></i>
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
