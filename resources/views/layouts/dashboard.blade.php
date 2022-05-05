<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Tawreeda</title>
@yield('styles')

    <!-- Styles -->
    <link href="{{asset('assets/css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="apple-touch-icon" href="{{asset('assets/xd/logo.svg')}}">
    <link rel="icon" href="{{asset('assets/xd/logo.svg')}}">
    <style>

        .list-group-item{
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        #sidebare .active{
            border-right: #FF6A00 3px solid;
            color: #FF6A00 !important;
            background-color: #F5F8FA;
        }
        @import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');
        @media( max-width:1000px){
            .navbar-left{
                width: 100%;
            }
        }

        @media(max-width:994px){

            #categories{
                display: none !important;
            }
        }

        @media(max-width:575px)
        {

            .media{
                padding-right: 16px !important;
            }
            .card{
                width:80%
            }
        }
        .select2 {
            width: 100% !important;
        }
    </style>
    {{--  <!--  Open Graph Tags -->--}}
    {{--  <meta property="og:title" content="TheSaaS">--}}
    {{--  <meta property="og:description" content="A responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4.">--}}
    {{--  <meta property="og:image" content="http://thetheme.io/thesaas/assets/img/og-img.jpg">--}}
    {{--  <meta property="og:url" content="http://thetheme.io/thesaas/">--}}
    {{--  <meta name="twitter:card" content="summary_large_image">--}}
    @livewireStyles

</head>

<body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0" style="background-image:url({{asset('assets/xd/dashboard-bg.png')}}) ;font-family: 'DroidArabic Kufi-Regular';font-weight: normal;font-style: normal;" >


<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-sm" style="font-weight: 100px;position:fixed;height:70px;top: 0;background-color: #fff;">


    <div class="navbar-left">
        <button style="height: 50px;" id="side-btn" class="btn rounded-lg btn-sm btn-secondary py-1 fa fa-bars"></button>

        <a style="" class="navbar-brand mr-auto" href="/">
            <img class="logo-dark" src="{{asset('assets/xd/logo1.svg')}}" alt="logo" style="height:56px;">
        </a>

    </div>
</nav>

<div  style="position:relative;padding-top:70px !important;margin-right: 0px;" class="container text-right d-flex  flex-warp" id="main">
    <div class="text-right ml-5" id="sidebare" style="background-color:white;margin-right: 0;">

        <ul class="list-group pr-0">
            <li class="list-group-item border-0" style="font-size: 13px;">
                <a class="nav-link font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.home')) active @endif" aria-current="page" href="{{route('dashboard.home')}}">
                    <img src="{{asset('assets/xd/speedometer.svg')}}">
                    لوحة التحكم
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold text-primary" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.requests.*') || Route::is('dashboard.offers.*'))  active @endif" aria-current="page" href="{{route('dashboard.requests.index')}}">
                    <img src="{{asset('assets/xd/outline.svg')}}">
                    طلبات الأسعار
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.suppliers.*')) active @endif" aria-current="page" href="{{route('dashboard.suppliers.index')}}">
                    <img src="{{asset('assets/xd/supplier.svg')}}">
                    الموردين
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.buyers.*')) active @endif" aria-current="page" href="{{route('dashboard.buyers.index')}}">
                    <img src="{{asset('assets/xd/investor.svg')}}">
                    المشترين
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.reports.*')) active @endif" aria-current="page" href="{{route('dashboard.reports.index')}}">
                    <img src="{{asset('assets/xd/alert.svg')}}">
                    البلاغات
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.departments.*') || Route::is('dashboard.categories.*')) active @endif" aria-current="page" href="{{route('dashboard.departments.index')}}">
                    <img src="{{asset('assets/xd/menu.svg')}}">
                    الأقسام و الفئات
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.users.*')) active @endif" aria-current="page" href="{{route('dashboard.users.index')}}">
                    <img src="{{asset('assets/xd/users.svg')}}">
                    المستخدمين
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <a class="nav-link  font-weight-bold bx-0 mx-0 @if(Route::is('dashboard.settings.*')) active @endif" aria-current="page" href="{{route('dashboard.settings.edit')}}">
                    <img src="{{asset('assets/xd/users.svg')}}">
                    الإعدادات
                </a>
            </li>
            <li class="list-group-item border-0 mt-3 font-weight-bold" style="font-size: 13px;">
                <button class="mr-2 btn btn-danger font-weight-bold bx-0 mx-0" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('تسجيل خروج') }}
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="pt-6 w-100 pb-6" id="content">

        @yield('content')
    </div>

</div>
<!-- Scripts -->
<script src="{{asset('assets/js/page.min.js')}}"></script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    var active = $('.list-group-item .active img').attr('src');
    // console.log(active);
    active = active.replace('.svg','-active.svg');
    $('.list-group-item .active img').attr('src',active);

    $('#side-btn').on('click',function(){
        event.stopPropagation();
        $('#sidebare').toggleClass('sidebare-active');
    })

    window.addEventListener('click', function(e){
        if (!document.getElementById('sidebare').contains(e.target)){
            $('#sidebare').removeClass('sidebare-active');
        }
    });

    // $(window).click(function(){
    // })
</script>
@if(session()->has('success'))
    <script type="text/javascript">

        let timerInterval
        Swal.fire({
            title: `<div class='text-center'>{!!  session()->get('success') !!}</div> `,
            html: '',
            timer: 7000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    </script>
@endif
@yield('scripts')
@livewireScripts

</body></html>
