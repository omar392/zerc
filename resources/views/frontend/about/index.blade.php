@extends('frontend.layouts.index')
@section('title', __('site.about-'))
@section('content')
    <!-- Page Title -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_about_2) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ __('site.about') }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ __('site.about') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- New -->
    <div class="new-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="new-img">
                        <img src="{{ asset('dashboard/' . $cover->image_about_3) }}" alt="New">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <h2>{{ __('site.about') }}</h2>
                        </div>
                        <p>{!! $about->about !!}</p>
                        <a class="cmn-btn" href="{{ route('front.contact') }}">
                            {{ __('site.contact') }}
                            <i class='bx bx-plus'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End New -->
    <!-- Work -->
    <section class="work-area pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{ $setting->name }}</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-verify"></i>
                        <h3>{{ __('site.mission') }}</h3>
                        <p>{!! $about->mission !!}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-file"></i>
                        <h3>{{ __('site.vision') }}</h3>
                        <p>{{ $about->vision }}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-comment"></i>
                        <h3>{{ __('site.goals') }}</h3>
                        <p>{!! $about->goals !!}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Work -->
@endsection
