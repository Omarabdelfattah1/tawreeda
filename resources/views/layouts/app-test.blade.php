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

@yield('header')
                @yield('test')
  @yield('footer')
  <a target="_blank" href="https://wa.me/{{$storage['watsapp']??env('TAWREEDA_ADMIN_MOBILE')}}" style="position:fixed;bottom:40px;right:40px;z-index:1111;"><img style="width:70px;" src="{{asset('assets/xd/whatsapp.svg')}}" alt=""></a>
  <!-- /.footer -->
  <!-- Scripts -->
  <script src="{{asset('assets/js/app.js')}}"></script>

  <script src="{{asset('assets/js/page.min.js')}}"></script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>
  <script src="{{asset('assets/js/script.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('script')
  @yield('scripts')

  @livewireScripts
  @if(session()->has('message'))
    <script type="text/javascript">

        let timerInterval
        Swal.fire({
          title: `<div class='text-center'>{!!  session()->get('message') !!}</div> `,
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
    </body>
</html>
