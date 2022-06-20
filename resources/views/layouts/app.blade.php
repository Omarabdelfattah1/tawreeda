@extends('layouts.app-test')

@section('header')
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-sm" style="font-weight: 100px;position:fixed;height:70px;top: 0;background-color: #ffffffb3;">
  <div class="container">



  <section class="navbar-mobile">
      <nav class="nav nav-navbar ml-auto">
      <a style="" class="nav-link" href="{{route('home')}}"> الرئيسية</a>
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
      <a style="" class="navbar-brand mr-auto" href="{{route('home')}}">
      <img class="logo-dark" src="{{asset('assets/xd/logo1.svg')}}" alt="logo" style="height:56px;">
      </a>
  </div>
</nav>

@endsection
@section('test')
@yield('content')
@endsection

@section('footer')
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
            <a class="social-facebook" href="{{$settings['facebook']?? 'https://www.facebook.com'}}"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="{{$settings['twitter']?? 'https://www.twitter.com'}}"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="{{$settings['instagram']?? 'https://www.instagram.com'}}"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

@endsection
