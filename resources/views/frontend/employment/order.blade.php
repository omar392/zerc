@extends('frontend.layouts.index')
@section('title', __('site.emp-'))
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
                <!-- Contact -->
        <div class="contact-form-area pb-100">
            <div class="container">
                <div class="form-item">
                    <h2>{{ __('site.contact') }}</h2>
                <form id="employmentInfo" action="{{ route('contact.save') }}" method="POST" novalidate="novalidate">
                    @csrf
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.name') }}</label>
                                    <input type="text" name="name" id="name" placeholder="{{ __('site.name') }}" class="form-control">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.phone') }}</label>
                                    <input type="text" name="phone" id="phone" placeholder="{{ __('site.phone') }}" class="form-control">
                                    <span class="text-danger error-text phone_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.age') }}</label>
                                    <input type="text" name="age" id="age"  placeholder="{{ __('site.age') }}" class="form-control">
                                    <span class="text-danger error-text age_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.date') }}</label>
                                    <input type="date" name="date" id="date"  placeholder="{{ __('site.date') }}" class="form-control">
                                    <span class="text-danger error-text date_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.passport_id') }}</label>
                                    <input type="text" name="passport_id" id="passport_id"  placeholder="{{ __('site.passport_id') }}" class="form-control">
                                    <span class="text-danger error-text passport_id_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.national_id') }}</label>
                                    <input type="text" name="national_id" id="national_id"  placeholder="{{ __('site.national_id') }}" class="form-control">
                                    <span class="text-danger error-text national_id_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.place_of_residence') }}</label>
                                    <input type="text" name="place_of_residence" id="place_of_residence"  placeholder="{{ __('site.place_of_residence') }}" class="form-control">
                                    <span class="text-danger error-text place_of_residence_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-12">
                                <div class="form-group">
                                    <h3>NEXT OF KIN'S INFORMATION</h3>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.name') }}</label>
                                    <input type="text" name="alt_name" id="alt_name" placeholder="{{ __('site.name') }}" class="form-control">
                                    <span class="text-danger error-text alt_name_err"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('site.phone') }}</label>
                                    <input type="text" name="alt_phone" id="alt_phone" placeholder="{{ __('site.phone') }}" class="form-control">
                                    <span class="text-danger error-text alt_phone_err"></span>
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
                                <button type="submit" class="btn btn-submitt">
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
@endsection
