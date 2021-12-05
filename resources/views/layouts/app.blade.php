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
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0e0ce68b6f9e02f8917d', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('call-event', function(data) {
      $('#push-notification').append(alert(JSON.stringify(data)))
    });
  </script>
    </head>
    
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">
         <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-sm" style="font-weight: 100px;position:fixed;height:70px;top: 0;background-color: #ffffffb3;">
            <div class="container">
            
            

            <section class="navbar-mobile">
                <nav class="nav nav-navbar ml-auto">
                <a style="" class="nav-link" href="/"> الرئيسية</a>
                @guest
                <a style="" class="nav-link" href="/why-us">ليه توريدة؟</a>
                <a style="" class="nav-link" href="{{route('departments')}}">الموردين</a>
                <a style="" class="nav-link" href="{{route('request')}}">أطلب عرض أسعار</a>
                <a style="" class="nav-link active" href="{{route('login')}}">تسجيل دخول</a>
                <a style="" class="nav-link" href="{{route('register')}}" >
                    <button class="btn btn-lg rounded btn-primary m-auto" style="">إنضم إلينا</button> 
                </a>                
                @else
                  @if(auth()->user()->userable instanceof App\Models\Buyer)
                  <a style="" class="nav-link" href="/why-us-buyer">ليه توريدة؟</a>
                  <a style="" class="nav-link" href="{{route('departments')}}">الموردين</a>
                  <a style="" class="nav-link" href="{{route('request')}}">أطلب عرض أسعار</a>
                  @elseif(auth()->user()->userable instanceof App\Models\supplier)
                  
                  <a style="" class="nav-link" href="/{{auth()->user()->userable->id}}">صفحة الشركة</a>
                  <a style="" class="nav-link" href="/why-us-supplier">ليه توريدة؟</a>

                  @endif
                  <div class="dropdown nav-link ">
                    <a id="navbarDropdown" class="dropdown-toggle p-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        <img src="{{asset('assets/xd/my-profile.png')}}" alt="" style="width: 15px;"> حسابي
                    </a>
                    <div class="dropdown-menu dropdown-menu-left text-right" aria-labelledby="navbarDropdown">
                    @if(auth()->user()->userable instanceof \App\Models\Supplier)
                      <a class="dropdown-item" href="{{route('supplier.requests.index')}}">
                    @elseif(auth()->user()->userable instanceof \App\Models\Admin)
                      <a class="dropdown-item" href="{{route('dashboard.home')}}">
                    @else
                    <a class="dropdown-item" href="{{route('buyer.requests.index')}}">

                    @endif
                    {{ __('الملف الشخصي') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('تسجيل خروج') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </div>
                  </div>
                  @livewire('notifications')
                
                @endguest

                </nav>
            </section>
            </div>
            <div class="navbar-left">
                <button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                <a style="" class="navbar-brand mr-auto" href="/">
                <img class="logo-dark" src="{{asset('assets/xd/logo1.svg')}}" alt="logo" style="height:56px;">
                </a>
            </div>
        </nav>


                @yield('content')
        <!-- Footer -->
  <footer class="footer border-top" style="line-height: 42px;">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 row text-right">
          <a class="col-xl-3 col-lg-6 col-md-12" href="index.html"><img src="{{asset('assets/xd/logo.svg')}}" alt="logo" style="height:42px;width: 150px;"></a>
          <div class="col-xl-9 col-lg-6 col-md-12 row">
            <div class="col-xl-3 col-md-">سياسة خصوصية</div>
            <div class="col-xl-9 col-md- row">
              <div class="col-xl-5 col-md-">معايير الإستخدام</div>
              <div class="col-xl-7 col-md-">سياسة التسجيل و المعلومات</div>
            </div>

          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 text-right">
          <div class="social">
            <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
            <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
          </div>
        </div>        
      </div>
    </div>
  </footer>
  <a target="_blank" href="https://wa.me/{{env('TAWREEDA_ADMIN_MOBILE')}}" style="position:fixed;bottom:40px;right:40px;z-index:1111;"><img style="width:70px;" src="{{asset('assets/xd/whatsapp.svg')}}" alt=""></a>
  <!-- /.footer -->
  <!-- Scripts -->
  
  <script src="{{asset('assets/js/page.min.js')}}"></script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>
  <script src="{{asset('assets/js/script.js')}}"></script>
  <script src="{{asset('assets/js/app.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('scripts')

  @livewireScripts
  @if(session()->has('message'))
    <script type="text/javascript">
     
        let timerInterval
        Swal.fire({
          title: `<div class='text-center'>{{  session()->get('message') }}</div> `,
          html: '',
          timer: 3000,
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
    </body>
</html>
