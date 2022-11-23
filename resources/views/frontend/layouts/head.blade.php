    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <!-- Bootstrap CSS -->
       @if (app()->getLocale() == 'ar')
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.rtl.min.css') }}">
       @endif
       @if (app()->getLocale() == 'en')
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
       @endif
       <!-- Meanmenu CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
       <!-- Nice Select JS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.min.css') }}">
       <!-- Boxicon CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/boxicons.min.css') }}">
       <!-- Flaticon CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/flaticon.css') }}">
       <!-- Popup CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
       <!-- Odometer CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/odometer.min.css') }}">
       <!-- Owl Carousel CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
       <!-- Animate CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
       <!-- Style CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
       <!-- Responsive CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
       <!-- Theme Dark CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme-dark.css') }}">
       <!-- RTL CSS -->
        @if (app()->getLocale() == 'ar')
       <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}">
        @endif
        <link rel="icon" type="image/png" href="{{ asset('frontend/assets/img/30-30.png') }}">


        {{-- seo --}}
        <meta charset="UTF-8">
        <meta name="theme-color" content="#e25448">
        <meta name="description" content="{{ $seo->description }}">
        <meta name="keywords" content="{{ $seo->key }}">
        <meta name="author" content="Omar">
        <meta name="copyrights" content="Omar">
        <meta name="robots" content="noindex, nofollow">
        <link rel="canonical" href="{{ $seo->url }}">
        <link rel="prev" href="{{ $seo->url }}">
        <link rel="next" href="{{ $seo->url }}">
        <link rel="alternate" href="{{ $seo->url }}" hreflang="ar">
        <link rel="alternate" href="{{ $seo->url }}" hreflang="en-us">
        <meta property="og:url" content="{{ route('front.home') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:locale" content="en">
        <meta property="og:locale:alternate" content="ar">
        <meta property="og:locale:alternate" content="en_US">
        <meta property="og:image" content="{{ asset('dashboard/' . $setting->image) }}">
        <meta property="twitter:card" content="{{ $seo->description }}">
        <meta property="twitter:title" content="{{ $seo->title }}">
        <meta property="twitter:description" content="{{ $seo->description }}">
        <meta property="twitter:image" content="{{ asset('dashboard/' . $setting->image) }}">
        {{-- end seo --}}
        <title>{{ $setting->name }} @yield('title')</title>
        @toastr_css

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/30-30.png') }}">
        
    </head>
