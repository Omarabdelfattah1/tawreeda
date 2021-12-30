<div class="form-group clearfix">
    <label for="name" class="float-right mb-5">إسم المستخدم <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model="feilds.name" id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="الإسم">
</div>
@error('feilds.name')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group clearfix">
    <label for="user-phone" class="float-right mb-5">رقم الموبيل  <span class="text-danger" style="font-size:20px;">*</span></label>
    <input type="number" wire:model="feilds.mobile" id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
</div>
@error('feilds.mobile')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group clearfix">
    <label for="user-email" class="float-right mb-5"> عنوان البريد الإلكتروني إن وجد</label>
    <input type="email" wire:model="feilds.email" id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="البريد الإلكتروني">
</div>
@error('feilds.email')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    <div class="form-group clearfix">
    <label for="title" class="float-right mb-5">  اللقب  </span></label>
    <input wire:model="feilds.title" name="title" id="" value="{{old('title')}}" class="form-control form-control-lg rounded-lg border border-secondary">
</div>
@error('feilds.title')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group clearfix">
    <label for="summary" class="float-right mb-5">  نبذة عن صفة المستخدم  <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model="feilds.summary" id="summary" value="{{old('summary')}}" name="summary" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : صاحب الشركة و مدير تنفيذي">
</div>
@error('feilds.summary')
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
        <input wire:model="feilds.photo" type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
        </div>
    </div>
    </div>
</div>
@error('feilds.photo')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group clearfix">
    <label for="password" class="float-right mb-5">  كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model="feilds.password" id="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
</div>
@error('feilds.password')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group clearfix">
    <label for="password-confirm" class="float-right mb-5">  تأكيد كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model="feilds.password_confirmation" id="password-confirm" name="password_confirmation" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
</div>
@error('feilds.password_confirmation')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
@enderror