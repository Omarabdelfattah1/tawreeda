@extends('layouts.dashboard')
@section('content')

<div class="row" id="content">
  <div class="col-12 text-right" style="font-size:30px;">
    إضافة مشتري
  </div>


  <form class="pt-6 row mx-auto w-100 bg-white py-3" action="{{route('dashboard.buyers.store')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
      @csrf
      <div class="form-group">
        <label class="mb-3" for="name">إسم الشركة:</label>
        <input type="text" name="company_name" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group" style="clear: right;">
        <label class="mb-3">شعار الشركة:</label>
        <div class="d-flex">
          <div>
            <img style="width: 50px;" src="{{asset('assets/xd/profile/customer.png')}}" alt="">
          </div>
          <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

            <div class="py-2 mx-auto"> 
              <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
            </div>
            <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
              <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="company_logo">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="mb-3" for="type">نوع الشركة</label>
        <select type="text" name="" id="type" placeholder="" class="form-control rounded-lg">
          <option value="تاجر">
            تاجر</option>
          <option value="مستهلك نهائي">
            مستهلك نهائي</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="mb-3" for="name">إسم المستخدم:</label>
        <input type="text" name="name" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group">
        <label class="mb-3" for="name"> رقم الموبيل:</label>
        <input type="text" name="mobile" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group">
        <label class="mb-3" for="name">  عنوان البريد الإلكتروني:</label>
        <input type="text" name="email" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group">
        <label class="mb-3" for="name">  اللقب:</label>
        <input type="text" name="title" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group">
        <label class="mb-3" for="name">  نبذة عن صفة المستخدم:</label>
        <input type="text" name="summary" id="name" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group" style="clear: right;">
        <label class="mb-3"> صورة المستخدم:</label>
        <div class="d-flex">
          <div>
            <img style="width: 50px;" src="{{asset('assets/xd/profile/customer.png')}}" alt="">
          </div>
          <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

            <div class="py-2 mx-auto"> 
              <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
            </div>
            <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
              <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="mb-3" for="password"> كلمة المرور:</label>
        <input type="password" name="password" id="password" placeholder="" class="form-control rounded-lg">
      </div>
      <div class="form-group">
        <label class="mb-3" for="password"> تأكيد كلمة المرور:</label>
        <input type="password" name="password_confirmation" id="password" placeholder="" class="form-control rounded-lg">
      </div>
    <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      
    </div>

  </form>  
</div>
@endsection
