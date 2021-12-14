<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>Tawreeda</title>
        @yield('styles')

        <!-- Styles -->
        <link href="{{asset('assets/css/page.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{asset('assets/xd/logo.svg')}}">
        <link rel="icon" href="{{asset('assets/xd/logo.svg')}}">
        @livewireStyles
    </head>
    
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">

                @yield('content')

 
    </body>
</html>
