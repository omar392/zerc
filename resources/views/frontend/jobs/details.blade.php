@extends('frontend.layouts.index')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ $job->title }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ $job->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog Details -->
    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details-item">
                        <div class="details-img">
                            <img src="{{ asset('dashboard/employments/' . $job->image) }}" alt="{{ $job->title }} ">
                            <h2>{{ $job->title }} </h2>
                            <div class="d-content">
                                <p>{!! $job->description !!} </p>
                            </div>
                        </div>
                        <div class="details-tag">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="right">
                                        <ul>
                                            <li>
                                                <a href="{{ $setting->facebook }}" target="_blank">
                                                    <i class='bx bxl-snapchat'></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $setting->twitter }}" target="_blank">
                                                    <i class='bx bxl-twitter'></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $setting->linkedin }}" target="_blank">
                                                    <i class='bx bxl-linkedin'></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ $setting->instagram }}" target="_blank">
                                                    <i class='bx bxl-instagram'></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right">
                                        <a class="cmn-btn" href="{{ route('front.employmment') }}">
                                            {{ __('site.apply') }}
                                            <i class='bx bx-plus'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Blog Details -->
@endsection
