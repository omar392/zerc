@extends('frontend.layouts.index')
@section('title', __('site.offer-'))
@section('content')
       <!-- Start Page Title Area -->
       <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_offer) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ __('site.quote') }}</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                            <li>{{ __('site.quote') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Quote Area -->
    <section class="quote-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="quote-content">
                        <h2>{{ __('site.quote') }}</h2>
                        <p>{{ __('site.quote_q') }}</p>

                        <div class="image">
                            <img src="{{ asset('dashboard/' . $cover->image_faqs) }}" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="tab quote-list-tab">

                        <div class="tab_content">
                            <div class="tabs_item">
                                <p>{{ __('site.exp') }}</p>
                                <form  action="{{route('email.offer')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('site.name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="{{ __('site.email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="{{ __('site.phone') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="type" required>
                                            <option value="1">--{{ __('site.type') }}--</option>
                                            @foreach ($insurance as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="default-btn">{{ __('site.quote') }} <span></span></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Quote Area -->
    <br><br>
    <!-- End Page Title Area -->
        <!-- Start Partner Area -->
        <section class="partner-area bg-black-color">
            <div class="container">
                <div class="partner-slides owl-carousel owl-theme">
                    @foreach ($partners as $item)
                    <div class="single-partner-item">
                        <a>
                            <img src="{{ asset('dashboard/partners/' . $item->image) }}" alt="image">
                        </a>
                    </div>
                    @endforeach
                    <div class="partner-slides owl-carousel owl-theme">


                    </div>
                </div>
            </div>
        </section>
        <!-- End Partner Area -->
@endsection
