@extends('frontend.layouts.index')
@section('title', __('site.contact-'))
@section('content')
    <!-- Page Title -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_contact) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ __('site.contact') }}</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('frontend/assets/img/30-30.png') }}" alt="Image">
                                <a href="{{ route('front.home') }}">{{ __('site.home') }}</a>
                            </li>
                            <li>
                                <span>/</span>
                            </li>
                            <li>
                                {{ __('site.contact') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Info -->
    <div class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-12">
                    <div class="info-item">
                        <i class='bx bx-world'></i>
                        <h3>{{ $setting->name }}</h3>
                        <p>{!! $setting->address !!}</p>
                        <ul>
                            <li>
                                <span>{{ __('site.phone') }}:</span> <a
                                    href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                            </li>
                            <li>
                                <span>{{ __('site.email') }}:</span> <a
                                    href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Info -->

    <!-- Contact -->
    <div class="contact-form-area pb-100">
        <div class="container">
            <div class="form-item">
                <h2>{{ __('site.contact') }}</h2>
                <form id="contactInfo" action="{{ route('contact.save') }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>{{ __('site.name') }}</label>
                                <input type="text" name="name" id="name" placeholder="{{ __('site.name') }}"
                                    class="form-control">
                                <span class="text-danger error-text name_err"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>{{ __('site.email') }}</label>
                                <input type="text" name="email" id="email" placeholder="{{ __('site.email') }}"
                                    class="form-control">
                                <span class="text-danger error-text email_err"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>{{ __('site.phone') }}</label>
                                <input type="text" name="phone" id="phone" placeholder="{{ __('site.phone') }}"
                                    class="form-control">
                                <span class="text-danger error-text phone_err"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>{{ __('site.subject') }}</label>
                                <input type="text" name="subject" id="subject" placeholder="{{ __('site.subject') }}"
                                    class="form-control">
                                <span class="text-danger error-text subject_err"></span>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>{{ __('site.message') }}</label>
                                <textarea name="message" class="form-control" id="message" placeholder="{{ __('site.message') }}" cols="30"
                                    rows="8"></textarea>
                                <span class="text-danger error-text message_err"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="text-danger error-text g-recaptcha-response_err"></span>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-submit">
                                {{ __('site.send') }}
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Map -->
    <div class="map-area">
        <div class="container-fluid p-0">
            <iframe id="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59843174.53779285!2d62.17507173408571!3d23.728204508550363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3663f18a24cbe857%3A0xa9416bfcd3a0f459!2sAsia!5e0!3m2!1sen!2sbd!4v1599227927146!5m2!1sen!2sbd"
                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- End Map -->
@endsection
