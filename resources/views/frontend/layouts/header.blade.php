        <!-- Preloader -->
        <div class="loader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Navbar -->
        <div class="navbar-area fixed-top">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="{{ route('front.home') }}" class="logo">
                    <img src="{{ asset('dashboard/' . $setting->image) }}" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('front.home') }}">
                            <img src="{{ asset('dashboard/' . $setting->image) }}" class="logo-one" alt="Logo">
                            <img src="{{ asset('dashboard/' . $setting->image) }}" class="logo-two" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('front.home') }}"
                                        class="nav-link dropdown-toggle {{ URL::route('front.home') === URL::current() ? 'active' : '' }}">{{ __('site.home') }}</i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('front.about') }}"
                                        class="nav-link dropdown-toggle {{ URL::route('front.about') === URL::current() ? 'active' : '' }}">{{ __('site.about') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('front.services') }}"
                                        class="nav-link dropdown-toggle {{ URL::route('front.services') === URL::current() ? 'active' : '' }}">{{ __('site.services') }}
                                        <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach ($services as $item)
                                            <li class="nav-item">
                                                <a href="{{ route('front.services.details', [str_replace(' ', '-', $item->url)]) }}"
                                                    class="nav-link">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link dropdown-toggle {{ URL::route('front.gallery') === URL::current() ? 'active' : '' }} {{ URL::route('front.news') === URL::current() ? 'active' : '' }} {{ URL::route('front.faqs') === URL::current() ? 'active' : '' }} {{ URL::route('front.blog') === URL::current() ? 'active' : '' }}">{{ __('site.pages') }}
                                        <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('front.blog') }}"
                                                class="nav-link {{ URL::route('front.blog') === URL::current() ? 'active' : '' }}">{{ __('site.blog') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('front.faqs') }}"
                                                class="nav-link {{ URL::route('front.faqs') === URL::current() ? 'active' : '' }}">{{ __('site.faqs') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('front.news') }}"
                                                class="nav-link {{ URL::route('front.news') === URL::current() ? 'active' : '' }}">{{ __('site.news') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('front.gallery') }}"
                                                class="nav-link {{ URL::route('front.gallery') === URL::current() ? 'active' : '' }}">{{ __('site.gallery') }}</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('front.contact') }}"
                                        class="nav-link {{ URL::route('front.contact') === URL::current() ? 'active' : '' }}">{{ __('site.contact') }}</a>
                                </li>

                                <li class="nav-item">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if ($localeCode == LaravelLocalization::getCurrentLocale())
                                        @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                class="flag-bar">
                                                @if (app()->getLocale() == 'ar')
                                                    <span><b>English</b></span>
                                                @else
                                                    <span><b>العربية</b></span>
                                                @endif
                                            </a>
                                        @endif
                                    @endforeach
                                </li>

                            </ul>
                            <div class="side-nav">

                                <a class="cmn-btn" href="{{ route('front.employmment') }}">
                                    {{ __('site.emp') }}
                                    <i class='bx bx-user'></i>
                                </a>
                                <a class="cmn-btn" href="{{ route('front.jobs') }}">
                                    {{ __('site.jobs') }}
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
