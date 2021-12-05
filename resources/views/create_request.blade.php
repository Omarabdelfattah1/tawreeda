@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
  $('.select').selectpicker({
    noneSelectedText:''
  });
  $('#dept').on('change',function(){
    var id = this.value;
    $.get("/departments/"+id+"/categories", function(data, status){
      
      data.forEach(function(item){
        $('#category').append(`<option value="${item.id}">${item.name}</select>`);
      });
      $('#category').selectpicker('refresh');

    });
  })
  $('#category').on('change',function(){
    var id = this.value;
    $.get("/categories/"+id+"/tagproducts", function(data, status){
      
      data.forEach(function(item){
        $('#tagproduct').append(`<option value="${item.id}">${item.name}</select>`);
      });
      $('#tagproduct').selectpicker('refresh');

    });
  })
</script>
@endsection
@section('content')
<header class="header pb-3">
    <div class="container">
      <div class="row">
        <header class="section-header col-md-6 col-xl-6 mx-auto mb-5  text-center">
          <h2 class="lead-6 fs-1 text-primary text-center" style="font-weight: 700;">أطلب سعر</h2>
          <p class="lead-3 text-default mt-6 lh-lg text-center">هنوصل طلبك لكل المصانع و هتوصلك عروض الأسعار بكل سهولة علي موبايلك</p>
          @if($errors->any())
                  @foreach($errors->all() as $message)
                    <div class="alert-danger py-2 my-2">{{$message}}</div>
                  @endforeach
                @endif
        </header>
      </div>

      <div class="row">
      
        <!-- start-form  -->
        <form action="{{route('request')}}" method="post" class="col-md-8 mx-auto input-border" enctype="multipart/form-data">
          @csrf
          @guest 
          <div class="form-group">
            <label for="name" class="float-right mb-5">الإسم</label>
            <input id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب إسم المستخدم">
          </div>
          <div class="form-group">
            <label for="company-name" class="float-right mb-5">إسم الشركة</label>
            <input id="company-name" name="company_name" value="{{old('company_name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب إسم الشركة">
          </div>
          <div class="form-group my-6">
            <label  class="float-right mb-5"> نوع الشركة</label>
            <div class="row" style="clear: right;">
              <div class="d-flex justify-content-between mr-5" style="width: 250px;">
                <label class="radio-inline" >
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="optradio" checked> تاجر
                </label>
                <label class="radio-inline ">
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="optradio"> مستهلك نهائي
                </label>
                
              </div>
            </div>
            
          </div>
          <div class="form-group clearfix">
            <label for="phone" class="float-right mb-5">رقم الموبيل</label>
            <input id="phone" name="mobile" value="{{old('mobile')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="20123456789+">
          </div>
          @endguest
          <div class="form-group clearfix">
            <label for="dept" class="float-right mb-5">القسم</label>
            <select id="dept" name="department_id" class="select form-control form-control-lg bg-white rounded-lg border" data-style="">
              @foreach($departments as $d)
              <option value="{{$d->id}}" {{old('department_id')==$d->id?'selected':''}}>{{$d->name}}</option>
              @endforeach
            </select>

          </div>
          <div class="form-group clearfix">
            <label for="category" class="float-right mb-5">الفئة</label>
            <select id="category" name="category_id" class="select form-control form-control-lg bg-white rounded-lg border" data-style="">
              
            </select>

          </div>
          <div class="form-group clearfix">
            <label for="tagproduct" class="float-right mb-5">المنتجات</label>
            <select id="tagproduct" name="tagproducts[]" class="select form-control form-control-lg bg-white rounded-lg border" data-style="" multiple>
              
            </select>

          </div>
          
          <div class="form-group clearfix">
            <label for="details" class="float-right mb-5">: تفاصيل المنتج و الكميات</label>
            <textarea class="form-control rounded-lg border border-secondary" name="description" id="details"rows="5" placeholder="برجاء ذكر كميات المواد المطلوبة و أي تفاصيل أخرى">{{old('description')}}</textarea>

          </div>
          <div class="form-group my-6">
            <label  class="float-right mb-5"> هل توجد مرفقات؟</label>
            <div class="row" style="clear: right;">
              <div class="d-flex justify-content-between mr-5" style="width: 250px;">
                <label class="radio-inline ">
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="optradio1" checked> نعم
                </label>
                <label class="radio-inline ">
                  <input type="radio" class="ml-2" style="transform: scale(2);" name="optradio1">  لا
                </label>
                
              </div>
            </div>
            
          </div>
          
          <div class="form-group my-6 row" style="clear: right;">
            <div class="d-flex">
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                <div class="py-2 mx-autos"> 
                  <img class="w-30 float-right" src="assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="files[]" multiple>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group text-right">
            @auth
            <button class="btn rounded-lg btn-xl btn-primary ml-auto mt-5" type="submit"> إرسال</button>
            @else
            <a class="btn rounded-lg btn-xl btn-primary ml-auto mt-5"  data-toggle="modal" data-target="#check" > إرسال</a>
            @endauth
          </div>
          @guest
          <div class="modal fade" id="check" tabindex="-1" role="dialog" aria-labelledby="checkLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold" id="page1">
                <div class="modal-header" style="border-bottom: 0px;">
                  <h5 class="modal-title lead-6 text-primary font-weight-bold " id="loginLabel">عندك حساب؟</h2>
                </div>
                <div class="modal-body rounded-lg">
                  <!-- form  -->
                  <div class="mx-auto input-border">
        
                    <div class="form-group clear-both">
                      <label for="phone-email" class="float-right mb-5">رقم الموبيل</label>
                      <input id="phone-email" name="mobile_login" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
                    </div>
          
                    <div class="form-group">
                      <label for="password" class="float-right mb-5">الرقم السري</label>
                      <input id="password" type="password" name="password_login" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="كلمة المرور">
                    </div>
                    <div class="form-group ">
                      <p class="small mt-3 opacity-70  text-right"><a href="#"> نسيت كلمة المرور؟</a></p>
                      <button id="btn-login" class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" >سجل دخول</button>
                      <p class="small mt-3 opacity-70  text-right mt-5">معندكش حساب؟ <a class="btn btn-none text-primary" onclick="show('page2','page1')">أنشئ دلوقتي </a></p>
                    </div>
                    <p  class="text-default mt-6" style="font-size: 10px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>
          
                  </div>
                  <!-- end-form -->
                </div>
              </div>
              <div id="page2" style="display:none;" class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold" >
                <div class="modal-header" style="border-bottom: 0px;">
                  <h5 class="modal-title lead-6 text-primary font-weight-bold " id="loginLabel">قم بالتسجيل</h2>
                </div>
                <div class="modal-body rounded-lg">
                  <!-- form  -->
                  <div class="mx-auto input-border">
        
                    <div class="form-group">
                      <label for="password" class="float-right mb-5">الرقم السري</label>
                      <input id="password" type="password" name="password_register" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="كلمة المرور">
                    </div>
                    <div class="form-group ">
                      <p class="small mt-3 opacity-70  text-right"><a href="#"> نسيت كلمة المرور؟</a></p>
                      <button id="btn-login" class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" >سجل دخول</button>
                      <p class="small mt-3 opacity-70  text-right mt-5">عندك حساب؟ <a class="btn btn-none text-primary" onclick="show('page1','page2')">دخول </a></p>
                    </div>
                    <p  class="text-default mt-6" style="font-size: 10px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>
          
                  </div>
                  <!-- end-form -->
                </div>
              </div>
            </div>
          </div>
          @endguest
        </form>
        
    </div>
  </header>
@endsection
