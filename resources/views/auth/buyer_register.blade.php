@extends('layouts.app')

@section('content')
<header class="header pb-3">
    <div class="container">
      <div class="row">
        <header class="section-header col-md-6 col-xl-6 mx-auto mb-5 ">
          <h2 class="lead-6 fs-1 text-primary" style="font-weight: 700;">تسجيل مشتري</h2>
          <p class="lead-3 text-default mt-6 lh-lg"> املا البيانات دي عشان تقدر تشوف الشركات و تطلب عرض اسعار</p>
          @if($errors->any())
            @foreach($errors->all() as $message)
              <div class="alert-danger py-2 my-2">{{$message}}</div>
            @endforeach
          @endif
        </header>
      </div>

      <div class="row">
        <!-- start-form  -->
        <form method="post" class="col-md-8 col-xl-8 mx-auto input-border" action="{{route('register')}}" enctype="multipart/form-data">
          @csrf 
          <input type="hidden" name="user_type" value="buyer" id="">
          <div class="form-group clearfix">
            <label for="name" class="float-right mb-5">إسم المستخدم</label>
            <input required id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب إسم المستخدم">
          </div>
          @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="user-phone" class="float-right mb-5">رقم الموبيل </label>
            <input id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب رقم الموبيل">
          </div>
          @error('phone')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="user-email" class="float-right mb-5"> عنوان البريد الإلكتروني </label>
            <input id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب عنوان البريد لإلكتروني">
          </div>
          @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          
          <div class="form-group my-6">
            <label  class="float-right mb-5"> نوع الشركة</label>
            <div class="row" style="clear: right;">
              <div class="d-flex justify-content-between mr-5" style="width: 250px;">
                <label class="radio-inline" >
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="company_type" value="trader" checked> تاجر
                </label>
                <label class="radio-inline ">
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="company_type" value="consumer"> مستهلك نهائي
                </label>
                
              </div>
            </div>
          </div>
          @error('company_type')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="c-name" class="float-right mb-5">إسم الشركة</label>
            <input id="c-name" value="{{old('company_name')}}" name="company_name" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="">
          </div>
          <div class="form-group my-6 row" style="clear: right;">
            <label for="">شعار الشركة</label>
            <div class="d-flex">
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                <div class="py-2 mx-autos"> 
                  <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="company_logo">
                </div>
              </div>
            </div>
          </div>
          @error('logo')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="title" class="float-right mb-5">  اللقب </label>
            <input name="title" value="{{old('title')}}" id="" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال: مهندس">
            
          </div>
          @error('title')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="summary" class="float-right mb-5">  نبذة عن صفة المستخد </label>
            <input id="summary" value="{{old('summary')}}" name="summary" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : صاحب الشركة و مدير تنفيذي">
          </div>
          @error('summary')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group my-6">
            <label  class="float-right mb-5">  الصورة الشخصية</label>
            <div class="d-flex">
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                <div class="py-2 mx-autos"> 
                  <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
                </div>
              </div>
            </div>
          </div>
          @error('photo')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="password" class="float-right mb-5">  كلمة المرور</label>
            <input id="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
          </div>
          <div class="form-group clearfix">
            <label for="password-confirm" class="float-right mb-5">  تأكيد كلمة المرور</label>
            <input id="password-confirm" name="password_confirmation" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
          </div>
          @error('password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group ">
            <button class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5"> إرسال</button>
          </div>
          
        </form>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold">
              <div class="modal-header" style="border-bottom: 0px;">
                <h5 class="modal-title lead-6 text-primary font-weight-bold " id="exampleModalLabel">تسجيل الدخول</h2>
              </div>
              <div class="modal-body rounded-lg">
                <!-- form  -->
                <div class="mx-auto input-border">
      
                  <div class="form-group clear-both">
                    <label for="phone-email" class="float-right mb-5">رقم الموبيل أو البريد الإلكتروني</label>
                    <input id="phone-email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل أو البريد الإلكتروني">
                  </div>
        
                  <div class="form-group">
                    <label for="password" class="float-right mb-5">الرقم السري</label>
                    <input id="password" type="password" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="الرقم السري">
                  </div>
                  <div class="form-group ">
                    <p class="small mt-3 opacity-70  text-right"><a href="#"> نسيت كلمة المرور؟</a></p>
                    <button id="btn-login" class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" >سجل دخول</button>
                    <p class="small mt-3 opacity-70  text-right mt-5">معندكش حساب؟ <a href="#">أنشئ دلوقتي </a></p>
                  </div>
                <p  class="text-default mt-6" style="font-size: 10px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>
        
                </div>
                <!-- end-form -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="end" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-right rounded-lg">
              <div class="modal-header" style="border-bottom: 0px;">
                <h5 class="modal-title lead-3 text-primary font-weight-bold mx-auto w-50" id="exampleModalLabel">شكراً لإستخدامك توريدة </h2>
              </div>
              <div class="modal-body rounded-lg p-3">
                <!-- form  -->
                <div class="mx-auto input-border">
                  <img src="assets/xd/48-hours.png" alt="" class="w-25 d-block mx-auto">
                </div>
                <div class="bg-primary p-6 mt-3 rounded-lg text-center" style="line-height: 25px;">
                  هيوصلك عروض الأسعار على موبايلك في أسرع وقت ممكن <br> تابع صفحتك الشخصية ع الموقع <a href="">دوس هنا</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </header>
@endsection
