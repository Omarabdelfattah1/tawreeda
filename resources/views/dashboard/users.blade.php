@extends('layouts.dashboard')
@section('content')

<div class="row justify-content-between">
    <div class="col-md-4 text-right d-flex justify-content-between" style="font-size:30px;height: 70px;">
      <div class="col-md-6">
        المستخدمين
      </div>
      <div class=" col-md-6">
        <button class="btn btn-primary rounded mb-3" data-toggle="modal" data-target="#exampleModal">إضافة مستخدم</button>
      </div>
    </div>
    <div class="col-md-6" style="height: 70px;">
      <div class="d-flex justify-content-between form-control rounded-lg " style="width: 300x;">
        <input style="outline:none" type="text" class="border-0 text-default w-90" id="" placeholder="أكتب للبحث عن مستخدم">
        <div style="height:50px;">
          <button class="btn btn-none" type="submit">
            <i class="fa fa-search"></i>
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel">إضافة مستخدم</h5>
                </div>
                <form class="modal-body" action="{{route('dashboard.users.store')}}" method="post">
                  @csrf
                  <div class="form-group row">
                    <label class="col-4">البريد الإلكتروني</label>
                    <input name="user[email]" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group row">
                    <label class="col-4">الإسم</label>
                    <input name="user[name]" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group row">
                    <label class="col-4">رقم الموبيل</label>
                    <input name="user[mobile]" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group row">
                    <label class="col-4">الصلاحيات</label>
                    <select class="form-control col-8 rounded-lg" name="admin[name]" id="">
                      <option value="مدير">
                        مدير
                      </option>
                      <option value="مشرف">
                        مشرف
                      </option>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label class="col-4">كلمة المرور</label>
                    <input type="password" class="form-control col-8 rounded-lg" name="user[password]" id="">
                  </div>
                  <button class="btn btn-primary rounded-lg">إضافة</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>

  <div class="pt-6">
    @include('layouts.errors')
    <div id="tbl" class="text-dark p-2 w-100" style="display:table;border-collapse: collapse;">
      <div id="tbl-header" style="font-size: 14px;display:table-row;" class="text-primary font-weight-bold">
        <div  class="py-3" style="display:table-cell;padding:6px;">ID</div>
        <div  class="py-3" style="display:table-cell;padding:6px;">الإسم  </div>
        <div  class="py-3" style="display:table-cell;padding:6px;">الإيميل</div>
        <div  class="py-3" style="display:table-cell;padding:6px;">الصلاحيات</div>
        <div  class="py-3" style="display:table-cell;padding:6px;">التعديل</div>
      </div>
      
      @foreach($users as $user)
      <div style="display:table-row;font-size:12px;width: auto;clear: both;border-bottom: 4px solid #F4F4F4 !important;" class="sm-tbl-row bg-white">
        
        <div style="display:table-cell" class="sm-tbl-cell">
          <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الصورة</div>
          
          <div style="padding:6px;"  class=" sm-tbl-cell-header text-primary">
          {{$user->id}}
            
          </div>
        </div>
        <div style="display:table-cell" class="sm-tbl-cell">
          <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الإسم</div>
          
          <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
          {{$user->user->name}}

          </div>
        </div>
        <div style="display:table-cell;" class="sm-tbl-cell">
          <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الإيميل</div>
          
          <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
          {{$user->user->email}}

          </div>
        </div>
        <div style="display:table-cell;" class="sm-tbl-cell">
          <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary"> الصلاحيات</div>
          <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$user->name}}</div>
        </div>
        <div style="display:table-cell;" class="sm-tbl-cell mr-auto">
          <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">التعديل</div>
          
          <div class="d-flex py-3 sm-tbl-cell-header" style="padding:6px;"  >
            <button class="ml-2 btn btn-none p-0" data-toggle="modal" data-target="#edit">
            <i class="fa fa-edit" alt="" ></i>
              تعديل
            </button>

            <form action="{{route('dashboard.users.destroy',$user)}}" method="post" onsubmit="return confirm('هل تريد حذف هذا المستخدم؟');">
              @csrf
              @method('delete')
              <button class="ml-2 btn btn-none p-0" type="submit">
              <span >
            <i class="fa fa-trash text-danger" alt=""></i>
              مسح
            </span>
              </button>
            </form>
          </div>
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="editLabel">تعديل مستخدم</h5>
                </div>
                <form action="{{route('dashboard.users.update',$user)}}" method="post" class="modal-body">
                  @method('put')
                  @csrf
                  <div class="form-group row">
                    <label class="col-4">البريد الإلكتروني</label>
                    <input type="text" class="form-control col-8 rounded-lg" name="email" value="{{$user->user->email}}" id="">
                  </div>
                  <div class="form-group row">
                    <label class="col-4">الإسم</label>
                    <input type="text" class="form-control col-8 rounded-lg" name="user_name" value="{{$user->user->name}}" id="">
                  </div>
                  <div class="form-group row">
                    <label class="col-4">الصلاحيات</label>
                    <select class="form-control col-8 rounded-lg" name="name" value="" id="">
                      <option value="مدير" {{$user->name=='مدير'?'selected':''}}>
                        مدير
                      </option>
                      <option value="مشرف" {{$user->name=='مشرف'?'selected':''}}>
                        مشرف
                      </option>
                      </select>
                  </div>
                  <div class="form-group row">
                    <label class="col-4">كلمة المرور</label>
                    <input type="password" class="form-control col-8 rounded-lg" name="password" value="" id="">
                  </div>
                  <button class="btn btn-primary rounded-lg">تعديل</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
  </div>
@endsection