@extends('layouts.app')


@section('content')
      <header  class="header pb-3">
        <div class="container">
          <div class="row">
            <header class="section-header col-md-6 col-xl-6 mx-auto mb-5 ">
              <h2 class="lead-6 fs-1 text-primary" style="font-weight: 700;">تسجيل موردين</h2>
              <p class="lead-3 text-default mt-6 lh-lg">املا البيانات دي  عشان تقدر تعرض منتجاتك  علي توريدة</p>
                @if($errors->any())
                  @foreach($errors->all() as $message)
                    <div class="alert-danger py-2 my-2">{{$message}}</div>
                  @endforeach
                @endif
              <hr>
            </header>
          </div>
          <div class="row">
            <form class="col-md-8 mx-auto" method="post" action="{{route('register')}}" enctype="multipart/form-data">
              @csrf
              <div id="Page1">
                <div class="form-group">
                  <label for="company-name" class="float-right mb-5">إسم الشركة <span class="text-danger" style="font-size:20px;">*</span> </label>
                  <input id="company-name" value="{{old('company_name')}}" name="company_name" class="form-control form-control-lg rounded-lg border border-secondary">
                </div>
                <div class="form-group">
                  <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
                  <select name="state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary">
                    <option value="القاهرة">
                      لقاهرة
                    </option>
                    <option value="الإسكندرية">
                      الإسكندرية</option>
                    <option value="الشرقية">
                      الشرقية

                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="company-address" class="float-right mb-5">عنوان الشركة <span class="text-danger" style="font-size:20px;">*</span></label>
                  <input id="company-address" value="{{old('company_address')}}" name="company_address" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل أو البريد الإلكتروني">
                </div>
                
                <div class="form-group">
                  <label for="details" class="float-right mb-5">:   نبذة عن الشركة  <span class="text-danger" style="font-size:20px;">*</span></label>
                  <textarea name="about" class="form-control rounded-lg border border-secondary" id="details"rows="5" placeholder="أكتب نبذة عن الشركة">{{old('about')}}</textarea>

                </div>
                <div class="form-group">
                  <label for="dept" class="float-right mb-5">القسم <span class="text-danger" style="font-size:20px;">*</span></label>
                  <select name="department[]" id="dept" class="form-control form-control-lg rounded-lg border border-secondary text-default" multiple>
                    @foreach($departments as $d)
                    <option value="{{$d->id}}" {{ (collect(old('departments'))->contains($d->id)) ? 'selected':'' }}>
                      {{$d->name}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="category" class="float-right mb-5">الفئة</label>
                  <select id="category" name="categories[]" class="form-control form-control-lg rounded-lg border border-secondary" multiple>
                  @foreach($categories as $c)
                    <option value="{{$c->id}}" {{ (collect(old('categories'))->contains($c->id)) ? 'selected':'' }}>
                      {{$c->name}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="crn" class="float-right mb-5">رقم السجل التجاري</label>
                  <input id="crn" name="company_CRN" value="{{old('company_CRN')}}"  class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                </div>
                <div class="form-group">
                  <label for="tax" class="float-right mb-5">البطاقة الضريبية</label>
                  <input id="tax" name="company_TXCard" value="{{old('company_TXCard')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                </div>
                <div class="form-group">
                  <label for="emp" class="float-right mb-5"> عدد الموظفين <span class="text-danger" style="font-size:20px;">*</span></label>
                  <input id="emp" name="employees_number" value="{{old('employees_number')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 7">
                </div>
                <div class="form-group my-6">
                  <label  class="float-right mb-5">  عندك كتالوج؟ </label>
                  <div class="row" style="clear: right;">
                    <div class="col-4 d-flex justify-content-between">
                      <label class="radio-inline ">
                        <input type="radio" class="ml-2" style="transform: scale(2);" name="has_cataloge" checked> نعم
                      </label>
                      <label class="radio-inline ">
                        <input type="radio" class="ml-2" style="transform: scale(2);" name="has_cataloge">  لا
                      </label>
                      
                    </div>
                  </div>
                  
                </div>
                <div class="form-group my-6">
                  <label  class="float-right mb-5"> الكاتالوج</label>
                  <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                      <div class="py-2 mx-autos"> 
                        <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                      </div>
                      <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                        <input type="file" value="{{old('cataloge')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="cataloge">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="text-center">
                  <a onclick="return show('Page2','Page1');" class="btn rounded-lg  btn-primary p-3  w-20 mt-5"> التالي</a>

                </div>
              </div>
          
              <div id="Page2" style="display:none">
              <input type="hidden" name="user_type" value="supplier" id="">
          <div class="form-group clearfix">
            <label for="name" class="float-right mb-5">إسم المستخدم <span class="text-danger" style="font-size:20px;">*</span></label>
            <input id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="الإسم">
          </div>
          @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="user-phone" class="float-right mb-5">رقم الموبيل  <span class="text-danger" style="font-size:20px;">*</span></label>
            <input id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
          </div>
          @error('mobile')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="user-email" class="float-right mb-5"> عنوان البريد الإلكتروني </label>
            <input id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="البريد الإلكتروني">
          </div>
          @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
              <div class="form-group clearfix">
            <label for="title" class="float-right mb-5">  اللقب  <span class="text-danger" style="font-size:20px;">*</span></label>
            <input name="title" id="" value="{{old('title')}}" class="form-control form-control-lg rounded-lg border border-secondary">
          </div>
          @error('title')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="form-group clearfix">
            <label for="summary" class="float-right mb-5">  نبذة عن صفة المستخدم  <span class="text-danger" style="font-size:20px;">*</span></label>
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
            <label for="password" class="float-right mb-5">  كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
            <input id="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
          </div>
          <div class="form-group clearfix">
            <label for="password-confirm" class="float-right mb-5">  تأكيد كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
            <input id="password-confirm" name="password_confirmation" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
          </div>
          @error('password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
                <div class="form-group text-center">
                  <button class="btn rounded-lg btn-xl btn-secondary ml-auto mt-5" onclick="return show('Page1','Page2');">
                    السابق
                  </button>
                  <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5">
                  <!-- <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5" data-toggle="modal" data-target="#exampleModal"> -->
                    إرسال
                  </button>
                </div>
                <!-- end-form -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content text-center p-3 rounded-lg">
                      <div class="modal-header">
                        <h5 class="modal-title text-primary mx-auto" id="exampleModalLabel">شكراً لإنضمامك لأسرة موردينا</h5>
                      
                      </div>
                      <div class="modal-body bg-primary rounded-lg">
                        هنتواصل معاك في أقرب وقت لتأكيد تسجيلك <br>
                        إستنا مننا رسالة على whatsapp
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
    </header>

@endsection