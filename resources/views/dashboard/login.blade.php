<html lang="ar" dir="rtl">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>TheSaaS — Responsive Bootstrap SaaS, Software &amp; WebApp Template</title>

  <!-- Styles -->
  <link href="{{asset('assets/css/page.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{asset('assets/img/apple-touch-icon.png')}}">
  <link rel="icon" href="{{asset('assets/img/favicon.png')}}">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');
    @media( max-width:1000px){
      .navbar-left{
        width: 100%;
      }
    }
    </style>
  <!--  Open Graph Tags -->
  <meta property="og:title" content="TheSaaS">
  <meta property="og:description" content="A responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4.">
  <meta property="og:image" content="http://thetheme.io/thesaas/assets/img/og-img.jpg">
  <meta property="og:url" content="http://thetheme.io/thesaas/">
  <meta name="twitter:card" content="summary_large_image">

</head>

<body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0" style="background-image:url({{asset('assets/xd/dashboard-bg.png')}}) ;font-family: 'DroidArabicKufiRegular';font-weight: normal;font-style: normal;" >

  <header class="header pb-3">
    <div class="container">
    @csrf

      <img src="{{asset('assets/xd/logo1.svg')}}" style="width:350px" class="d-block mx-auto mb-3">
        <form class=" mx-auto input-border d-block" style="width:350px" action="{{route('admin-login')}}" method="post">
        @csrf
        @include('layouts.errors')
          <div class="form-group clear-both">
            <input name="mobile" id="phone-email" class="form-control rounded-xl py-2" placeholder="إسم المستخدم"style="height:40px;font-weight:normal !important;font-style:normal;">
          </div>
          <div class="form-group">
            <input name="password" id="password" type="password" class="form-control rounded-xl py-2" placeholder="كلمة المرور"style="height:40px;font-weight:normal !important;font-style:normal;">
          </div>
          
          <div class="form-group ">
            <p class="text-right" style="font-size:12px;"> 
              <input type="checkbox" style="width:12px">
              تذكرني
            </p>
            <button style="height:40px;font-weight:normal !important;font-style:normal;text-align:center !important;" type="submit" class="btn rounded-xl btn-primary btn-block mt-5"> دخول</button>
          </div>
        </form>
        <div class="modal fade" id="recover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-right rounded-lg px-6" >
                <div class="py-5 px-6">
                  <h5 class="text-primary lead-4 mb-3 font-weight-bold" id="exampleModalLabel">إسترجاع كلمة المرور</h5>
                  <p class="">يرجى تأكيد رقم الهاتف و سنرسل لك كود لإعادة تعيين كلمة المرور</p>
                </div>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
              <div class="modal-body  border-0">
                <form >
                  <div class="form-group">
                    <label for="phone">رقم الجوال</label>
                    <input id="phone" type="text" class="form-control mt-4 rounded-lg" placeholder="أكتب رقم الجوال">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary rounded-lg text-center">إرسال</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      
    </div>
  </header>

  <!-- Scripts -->
  <script src="{{asset('assets/js/page.min.js')}}"></script>
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> 
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
  <script src="{{asset('assets/js/script.js')}}"></script>



</body></html>