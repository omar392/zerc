        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">{{ __('admin.menu') }}</li>
                        <li>
                            <a href="{{ route('adminhome') }}" class="waves-effect">
                                <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.dashboard') }} </span>
                            </a>
                        </li>
                        @if(Auth::guard('admin')->user()->hasPermission('roles-read'))
                        <li>
                            <a href="{{route('roles.index')}}" class="waves-effect">
                                <i class="fas fa-user-lock"></i><span>{{ __('admin.roles') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('admins-read'))
                        <li>
                            <a href="{{route('admins.index')}}" class="waves-effect">
                                <i class="fas fa-user-tag"></i><span>{{ __('admin.administrators') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('users-read'))
                        <li>
                            <a href="{{route('users.index')}}" class="waves-effect">
                                <i class="fas fa-users"></i><span>{{ __('admin.users') }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- @if(Auth::guard('admin')->user()->hasPermission('banners-read'))
                        <li>
                            <a href="{{ route('banners.index') }}" class="waves-effect">
                                <i class="fas fa-image"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.banners') }} </span>
                            </a>
                        </li>
                        @endif --}}
                        @if(Auth::guard('admin')->user()->hasPermission('services-read'))
                        <li>
                            <a href="{{ route('services.index') }}" class="waves-effect">
                                <i class="fas fa-image"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.services') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('news-read'))
                        <li>
                            <a href="{{ route('news.index') }}" class="waves-effect">
                                <i class="fas fa-newspaper"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.news') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('employments-read'))
                        <li>
                            <a href="{{ route('employments.index') }}" class="waves-effect">
                                <i class="fas fa-briefcase"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.employments') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('partners-read'))
                        <li>
                            <a href="{{ route('partners.index') }}" class="waves-effect">
                                <i class="fas fa-handshake"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.partners') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('blogs-read'))
                        <li>
                            <a href="{{ route('blog.index') }}" class="waves-effect">
                                <i class="fas fa-edit"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.blogs') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('faqs-read'))
                        <li>
                            <a href="{{ route('faqs.index') }}" class="waves-effect">
                                <i class="fas fa-question"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.faqs') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('countries-read'))
                        <li>
                            <a href="{{ route('countries.index') }}" class="waves-effect">
                                <i class="fas fa-flag"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.countries') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('galleries-read'))
                        <li>
                            <a href="{{ route('gallery.index') }}" class="waves-effect">
                                <i class="fas fa-camera"></i><span class="badge badge-success badge-pill float-right"></span> <span> {{ __('admin.gallery') }} </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('abouts-read'))
                        <li>
                            <a href="{{route('abouts.index')}}" class="waves-effect">
                                <i class="fas fa-book-open"></i><span>{{ __('admin.abouts') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('seos-read'))
                        <li>
                            <a href="{{route('seo.index')}}" class="waves-effect">
                                <i class="fas fa-search"></i><span>{{ __('admin.seos') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('settings-read'))
                        <li>
                            <a href="{{route('settings.index')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span>{{ __('admin.settings') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('counters-read'))
                        <li>
                            <a href="{{route('counters.index')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span>{{ __('admin.counters') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('locations-read'))
                        <li>
                            <a href="{{route('locations.index')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span>{{ __('admin.locations') }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- @if(Auth::guard('admin')->user()->hasPermission('insurances-read'))
                        <li>
                            <a href="{{route('insurances.index')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span>{{ __('admin.insurances') }}</span>
                            </a>
                        </li>
                        @endif --}}
                        @if(Auth::guard('admin')->user()->hasPermission('covers-read'))
                        <li>
                            <a href="{{route('covers.index')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span>{{ __('admin.covers') }}</span>
                            </a>
                        </li>
                        @endif
                    </ul>

                </div>
                <!-- Sidebar -->
                {{-- <div class="clearfix"></div> --}}

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
