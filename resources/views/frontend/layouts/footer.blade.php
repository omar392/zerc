        <!-- Footer -->
        <footer class="pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a class="logo" href="{{ route('front.home') }}">
                                    <img src="{{ asset('dashboard/' . $setting->image) }}" class="logo-one"
                                        alt="Logo">
                                    <img src="{{ asset('dashboard/' . $setting->image) }}" class="logo-two"
                                        alt="Logo">
                                </a>
                                <ul>
                                    <li>
                                        <span>{{ __('site.address') }}: </span>
                                        {{ $setting->address }}
                                    </li>
                                    <li>
                                        <span>{{ __('site.email') }}: </span>
                                        <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                    </li>
                                    <li>
                                        <span>{{ __('site.phone') }}: </span>
                                        <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-service">
                                <h3>{{ __('site.services') }}</h3>
                                <ul>
                                    @foreach ($services as $item)
                                        <li>
                                            <a
                                                href="{{ route('front.services.details', [str_replace(' ', '-', $item->url)]) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="footer-item">
                            <div class="footer-service">
                                <h3>{{ __('site.pages') }}</h3>
                                <ul>
                                    <li>
                                        <a href="{{ route('front.about') }}">{{ __('site.about') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.employmment') }}"
                                            target="_blank">{{ __('site.emp') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.jobs') }}">{{ __('site.jobs') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.gallery') }}">{{ __('site.gallery') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.blog') }}">{{ __('site.blog') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.contact') }}">{{ __('site.contact') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-newsletter">
                                <h3>{{ __('site.newsletter') }}</h3>
                                <p>{{ __('site.sub') }}</p>
                                <form id="emailservice" action="{{ route('email.email') }}" method="POST"
                                    novalidate="novalidate">
                                    @csrf
                                    <input type="text" name="email" id="email"
                                        placeholder="{{ __('site.email') }}" class="form-control">
                                    <span class="text-danger error-text email_err"></span>
                                    <button class="btn btn-submittt" type="submit">
                                        <i class="flaticon-send"></i>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Copyright -->
        <div class="copyright-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-item">
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
                                        <i class='bx bxl-linkedin-square'></i>
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
                        <div class="copyright-item">
                            <p>{{ $setting->footer }} {{ now()->year }} ،، {{ __('site.designed') }} <a href="{{ route('front.home') }}"
                                    target="_blank"> Joud Tech </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright -->
