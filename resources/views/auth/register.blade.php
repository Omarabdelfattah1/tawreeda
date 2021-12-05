@extends('layouts.app')

@section('content')
<header class="header pb-5">
    <div class="container text-center">
      <h1 class="text-primary mb-5" style="font-size: 50px;">إنضم إلينا</h1>
      <h3 class="text-default mb-5" style="font-size: 30px;">إنت مين؟</h3>
      <div class="w-40 d-flex justify-content-around mx-auto flex-wrap align-content-between">
        <a href="{{route('register.buyer')}}" class="btn text-sm rounded btn-outline-primary mb-6">عاوز منتج؟</a>
        <a href="{{route('register.supplier')}}" class="btn text-sm rounded btn-primary  mb-6">بتبيع منتج؟</a>
      </div>
      <p class="text-default mt-5"> عندك حساب؟ &nbsp;<a href="{{route('login')}}" class="text-primary">سجل دخول دلوقتي</a></p>
      <p  class="text-default" style="margin-top: 200px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>
    </div>  
      
  </header>
@endsection
