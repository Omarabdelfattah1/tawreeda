@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 100px;">
  <div class="d-flex  flex-warp" style="position:relative;width:100%" id="main">
    <div class="text-right fixed ml-5" id="sidebare" style="max-width: 250px !important;">
      <h6 class="mb-5">مرحباً <span class="font-weight-bold"> {{auth()->user()->name}}</span></h6>
      <ul class="nav flex-column shadow-lg rounded-lg bg-white pr-0" style="font-size: 15px;">
        <li class="nav-item my-5 d-flex pr-3">
          <img src="{{asset('assets/xd/price-request.svg')}}" alt="" class="ml-4" style="width:25px">
          <a class="nav-link text-default active" href="{{route('buyer.requests.index')}}">طلبات أسعار</a>
          <i class="fa fa-angle-left pr-3 mr-auto ml-3"></i>
        </li>
        <li class="nav-item my-5  d-flex pr-3">
          <img src="{{asset('assets/xd/contact-request.svg')}}" alt="" class="ml-4" style="width:25px">
          <a class="nav-link text-default active" href="{{route('buyer.calls')}}">طلبات الإتصال</a>

          <i class="fa fa-angle-left ml-4 mr-auto"></i>
        </li>
        <li class="nav-item my-5  d-flex pr-3">
          <img src="{{asset('assets/xd/reviews.svg')}}" alt="" class="ml-4" style="width:25px">
          <a class="nav-link text-default active" href="{{route('buyer.reviews')}}"> التقييمات المرسلة</a>

          <i class="fa fa-angle-left ml-4 mr-auto"></i>
        </li>
        <li class="nav-item my-5  d-flex pr-3">
          <img src="{{asset('assets/xd/settings.svg')}}" alt="" class="ml-4" style="width:25px">
          <a class="nav-link text-default active" href="{{route('buyer.settings')}}"> الإعدادات</a>

          <i class="fa fa-angle-left ml-4 mr-auto"></i>
        </li>
        <li class="nav-item my-5  d-flex pr-3">
          <img src="{{asset('assets/xd/profile.svg')}}" alt="" class="ml-4" style="width:25px">
          <a class="nav-link text-default active " href="{{route('buyer.profile')}}"> الملف الشخصي</a>

          <i class="fa fa-angle-left ml-4 mr-auto"></i>
        </li>
      </ul>
    </div>
    <div class="px-1 w-100" id="content">
        <div class="d-flex">
            <button style="height: 50px;" id="side-btn" class="btn rounded-lg btn-sm btn-secondary py-1"><i class=" fa fa-bars"></i></button>
        </div>
      @yield('dash-content')
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script>

        $('#side-btn').on('click',function(){
            event.stopPropagation();
            $('#sidebare').toggleClass('sidebare-active');
        })

        window.addEventListener('click', function(e){
            if (!document.getElementById('sidebare').contains(e.target)){
                $('#sidebare').removeClass('sidebare-active');
            }
        });
    </script>
@endsection
