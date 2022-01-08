@extends('layouts.app')

@section('content')
<header class="header pb-3">
    <div class="container">
      <div class="row">
        <header class="section-header col-md-4 col-xl-4 mx-auto mb-5">
          <h2 class="lead-7 text-primary float-right"><strong>تسجيل الدخول</strong></h2>
        </header>
      </div>

      <div class="row">
        <form class="col-md-4 col-xl-4 mx-auto input-border" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group clear-both">
            <label for="mobile" class="float-right mb-5">رقم الموبيل أو البريد الإلكتروني</label>
            <input id="mobile" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary @error('mobile') border-danger @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="رقم الموبيل أو البريد الإلكتروني">
            @error('mobile')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="float-right mb-5">كلمة المرور</label>
            <input id="password" name="password" type="password" class="form-control form-control-lg rounded-lg border border-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة المرور">

            @error('password')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group ">
            <button type="submit"  class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5"> سجل دخول</button>
            <p class="small mt-3 opacity-70  text-right mt-5">معندكش حساب؟ <a  href="{{ route('register') }}">أنشئ دلوقتي </a></p>
          </div>
        <p  class="text-default" style="margin-top: 200px; font-size: 10px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>

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
                    <button class="btn btn-primary rounded-lg">إرسال</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </header>

@endsection
