@extends('layouts.app')
@section('content')
  <header class="header " style="background-color:#fafafa ;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-right">
          
          <img src="assets/xd/logo.svg" alt="" style="margin-left: 45%;width: 50%;" class="mb-5">
          <h2 style="font-size: 250%;color:#44485C" class="lead-8">كل الي هتحتاجه</h2>
          <h2 style="font-size: 250%;" class="lead-6 text-primary mt-6">لمطعمك/كافيهاك/مصنعك</h2>
          <p style="line-height: 50px;font-weight: 500;" class="lead-3 mt-3">توريدة هتوصلك بكل المصانع بشكل مباشر و بدون وسطاء عشان توصل للمنتج الي انت عايزه بافضل سعر و جودة و حتوصلك عروض الأسعار بسرعة و بسهولة على موبايلك</p>
          @guest
          <div class="mt-5">
              <a style="height:70;font-size: 25px;" href="/why-us-supplier" class="pb-4 pt-2 px-5 btn btn-xl rounded-lg btn-primary m-3 d-inline-block" >بتبيع منتج</a>
              <a style="height:70;font-size: 25px;" href="/why-us-buyer" class="pb-4 pt-2 px-5 btn btn-xl rounded-lg btn-outline-primary m-3 d-inline-block" >عاوز منتج</a>
          </div>
          @endguest
        </div>
        <div class="col-md-6">
          <img src="assets/xd/main.png" alt="" style="background-image: url(assets/xd/imgs/home-img-pg.png);">
        </div>
      </div>
    </div>  
      
  </header>
@endsection