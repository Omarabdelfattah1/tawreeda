@extends('supplier.index')
@section('dash-content')
<div class="text-right col-12">
  <h1 class="d-flex lead-1 rounded-top py-3 mb-0 px-6 font-weight-bold text-primary shadow-lg" style="background-color: white; width: 175px;">
      الملف الشخصي
  </h1>
  <div class="bg-white">
    <div class="pt-6 p-4">
      <form action="{{route('supplier.profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">إسم المستخدم:</label>
            <input type="text" name="name" value="{{auth()->user()->name}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name"> رقم الموبيل:</label>
            <input type="text" name="mobile" value="{{auth()->user()->mobile}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">  عنوان البريد الإلكتروني:</label>
            <input type="text" name="email" value="{{auth()->user()->email}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">  اللقب:</label>
            <input type="text" name="title" value="{{auth()->user()->title}}" id="name" placeholder="مثال: مهندس " class="form-control rounded-lg">

          </div>
          @if(empty(auth()->user()->telegram_id))
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">  تفعيل إشعارات تيليجرام:</label>

            <script async
              src="https://telegram.org/js/telegram-widget.js?15"
              data-telegram-login="TawreedaBot"
              data-size="medium" data-userpic="false"
              data-request-access="write"
              data-auth-url="{{route('telegram.connect')}}"
              >
            </script>
          </div>
          @endif
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">  نبذة عن صفة المستخدم:</label>
            <input type="text" name="summary" value="{{auth()->user()->summary}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صورة المستخدم:</label>
            <div class="d-flex">
              <div>
                <img class="rounded-circle" style="width: 50px;height:50px;" src="{{asset(auth()->user()->photo)}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="mb-3" for="password">  كلمة المرور:</label>
          <input type="text" name="password" id="password" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group col-md-6">
          <label class="mb-3" for="password">  تأكيد كلمة المرور:</label>
          <input type="text" name="password-confirmation" id="password" placeholder="" class="form-control rounded-lg">
        </div>
        <button class="btn btn-primary btn-sm rounded px-6" type="submit">حفظ</button>
      </form>
    </div>
  </div>
</div>
@endsection
