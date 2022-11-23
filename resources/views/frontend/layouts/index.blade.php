<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

    @include('frontend.layouts.head')
    <body>

        @include('frontend.layouts.header')

        @yield('content')

        @include('frontend.layouts.footer')


        @include('frontend.layouts.script')
    </body>
</html>
