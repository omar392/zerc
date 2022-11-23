@extends('frontend.layouts.index')
@section('content')
    <!-- Banner -->
    <div class="banner-area">
        <div class="banner-shape">
            <img src="{{ asset('frontend/assets/img/home-one/banner/shape-bottom.png') }}" alt="Shape">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="banner-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <h1>{{ $setting->title }}</h1>
                                <p>{{ $setting->description }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-img">
                        <img src="{{ asset('dashboard/' . $cover->image_about) }}" alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- about -->
    <section class="work-area pb-70">
        <div class="container">
            <div class="section-title">
                {{-- <span class="sub-title"></span> --}}
                <h2>{{ __('site.about') }}</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-verify"></i>
                        <span>{{ __('site.about') }}</span>
                        <p>{!! $about->about !!}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-comment"></i>
                        <span>{{ __('site.mission') }}</span>
                        <p>{!! $about->mission !!}</p>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="work-item">
                        <i class="flaticon-file"></i>
                        <span>{{ __('site.vision') }}</span>
                        <p>{!! $about->vision !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about -->

    <!-- services -->
    <section class="location-area pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>{{ __('site.services') }}</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cmn-link">
                        <a href="{{ route('front.services') }}">
                            <i class="flaticon-right-arrow one"></i>
                            {{ __('site.read') }}
                            <i class="flaticon-right-arrow two"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="location-slider owl-theme owl-carousel">
                @foreach ($services as $item)
                    <div class="location-item">
                        <div class="top">
                            <a href="{{ route('front.services.details', [str_replace(' ', '-', $item->url)]) }}">
                                <img src="{{ asset('dashboard/services/' . $item->image) }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                        <h3>
                            <a
                                href="{{ route('front.services.details', [str_replace(' ', '-', $item->url)]) }}">{{ $item->title }}</a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End services -->

    <!-- jobs -->
    <section class="blog-area pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>{{ __('site.jobs') }}</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cmn-link">
                        <a href="{{ route('front.news') }}">
                            <i class="flaticon-right-arrow one"></i>
                            {{ __('site.read') }}
                            <i class="flaticon-right-arrow two"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($jobs as $item)
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="{{ route('front.job.details', [str_replace(' ', '-', $item->url)]) }}">
                                <img src="{{ asset('dashboard/employments/' . $item->image) }}" alt="Blog">
                            </a>
                        </div>
                        <span>{{ $item->created_at->format('d F Y') }}</span>
                        <h3>
                            <a href="{{ route('front.job.details', [str_replace(' ', '-', $item->url)]) }}">{{ $item->title }}</a>
                        </h3>
                        <div class="cmn-link">
                            <a href="{{ route('front.job.details', [str_replace(' ', '-', $item->url)]) }}">
                                <i class="flaticon-right-arrow one"></i>
                                {{ __('site.more') }}
                                <i class="flaticon-right-arrow two"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End jobs -->

        <!-- Counter -->
    <div class="counter-area pt-100">
        <div class="counter-shape">
            <img src="{{ asset('frontend/assets/img/home-one/banner/shape-bottom.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="counter-item">
                        <i class="flaticon-candidate"></i>
                        <p>{{ __('site.input0') }}</p>
                        <h3>
                            <span class="odometer"  dir="ltr"  data-count="{{ $counter->input0 }}">{{ $counter->input0 }}</span>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="counter-item">
                        <i class="flaticon-working-at-home"></i>
                        <p>{{ __('site.input3') }}</p>
                        <h3>
                            <span class="odometer"  dir="ltr"  data-count="{{ $counter->input3 }}">{{ $counter->input3 }}</span>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="counter-item">
                        <i class="flaticon-choice"></i>
                        <p>{{ __('site.jobs') }}</p>
                        <h3>
                            <span class="odometer"  dir="ltr"  data-count="{{ $counter->input2 }}">{{ $counter->input2 }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Counter -->


    <!-- Partner -->
    <div class="partner-area pt-100 pb-70">
        <div class="container">
            <div class="partner-slider owl-theme owl-carousel">
                @foreach ($partners as $item)
                <div class="partner-item">
                    <img src="{{ asset('dashboard/partners/' . $item->image) }}" style="width: 220px;height: 100px;" alt="Partner">
                    <img src="{{ asset('dashboard/partners/' . $item->image) }}" style="width: 220px;height: 100px;" alt="Partner">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Partner -->

@endsection
