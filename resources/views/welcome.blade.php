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
          <div class="mt-5 d-flex flex-wrap gap-xy-3">
              <div>
                  <a href="/why-us-supplier" class="lead-3 btn btn-xl rounded-lg btn-primary" >بتبيع منتج</a>

              </div>
                <div>
                    <a href="/why-us-buyer" class="lead-3 btn btn-xl rounded-lg btn-outline-primary" >عاوز منتج</a>

                </div>

              <div>
                  <a href="{{route('departments')}}" class="lead-3 btn btn-xl rounded-lg btn-primary">الموردين</a>
              </div>
          </div>
          @endguest
        </div>
        <div class="col-md-6">
          <img src="assets/xd/main.png" alt="" style="background-image: url('assets/xd/imgs/home-img-pg.png');">
        </div>
      </div>
    </div>

  </header>
@endsection
