@extends('layouts.dashboard')
@section('content')

<div class="row" id="content">
  <div class="col-12 justify-content-between text-right" style="font-size:30px;">
    تعديل مشتري <span class="text-primary">{{$buyer->user->name}}</span>
  </div>


  <div class="mt-6 card w-100">
    <ul class="nav nav-tabs px-0 font-weight-bold" id="myTab" role="tablist" style="height: 60px;">
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
          طلبات الأسعار
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
          طلبات الإتصال
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">
          التقييمات
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="border-right:0px !important;color: #6F6F6F !important;background: none !important;height: 100%;line-height: 30px;" class="nav-link" id="factories-tab" data-toggle="tab" href="#factories" role="tab" aria-controls="factories" aria-selected="false">
          الإعدادات
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="border-right:0px !important;color: #6F6F6F !important;background: none !important;height: 100%;line-height: 30px;" class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
        الملف الشخصي
        </a>
      </li>
    </ul>
    <div class="tab-content pt-3 mb-6 text-right" id="myTabContent">
      <div class="tab-pane  fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="text-right bg-white">
          <div class="pt-6">
            @foreach($buyer->requests as $request)
            <div class="row m-3" style="background-color: #FAFAFA">
              <div class="col-md-2 p-2 text-center"><img class="mr-3" style="width: 100px;" src="{{asset($buyer->company_logo)}}" alt=""></div>
              <div class="col-md-8">
                <h6 class="py-1 font-weight-bold">
                  {{$buyer->company_name}}

                </h6>
                <p style="line-height: 1rem;font-size: 12px;">{{$request->description}}</p>
                <div class="row mt-3">
                  <div class="col-md-4 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/icons/recevied.png')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold">{{$buyer->user->name}}</h6>
                  </div>
                  <div class="col-md-3 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/clock.svg')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold">{{$request->created_at->diffForHumans()}}</h6>
                  </div>
                  <div class="col-md-5 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/cup.png')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-2 p-2">
                <div class="media">
                  <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/cup.png')}}" alt="">
                  <h6 style="font-size: 12px;" class="font-weight-bold"> {{count($request->offers)}} عروض مقدمة</h6>
                </div>
                <a href="requested-details.html" class="btn mt-5 mx-4 text-primary" style="background-color: #FFF7F2;">العروض</a>

              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
      <div class="tab-pane  fade" id="product" role="tabpanel" aria-labelledby="product-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div id="tbl" class="text-dark border rounded-lg p-2" style="margin: 0px;display:table;width:100%;">
          <div id="tbl-header" style="font-size: 14px;display:table-row;">
            <div  class="py-3" style="display:table-cell;padding:6px;">التاريخ</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">التوقيت المناسب </div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الشركة</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الوظيفة</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">نوع الإتصال</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الحالة</div>
          </div>
          @foreach($buyer->calls as $call)
          <div style="display:table-row;font-size:12px;width: auto;clear: both;" class="sm-tbl-row mb-3">
            <div style="display:table-cell;" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التاريخ</div>

              <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->date}}</div>
            </div>
            <div style="display:table-cell;" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التوقيت المناسب </div>
              <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->from_time}} , {{$call->to_time}}</div>
            </div>
            <div style="display:table-cell" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الشركة</div>

              <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                <div class="media">
                  <img src="{{asset($call->supplier->company_logo)}}" alt="" style="width: 30px;">
                  <div class="mr-2">
                    <h6 class="font-weight-bold mb-2">{{$call->supplier->company_name}}</h6>
                    <p>{{$call->supplier->about}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div style="display:table-cell;" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الوظيفة</div>
              <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">أكواب ورقية و بلاستيكية</div>
            </div>
            <div style="display:table-cell;" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">نوع الإتصال</div>

              <div class="d-flex py-3 sm-tbl-cell-header" style="padding:6px;"  >
                <img src="{{asset('assets/xd/phone.svg')}}" alt="" style="width: 25px; margin: auto;">
                <img src="{{asset('assets/xd/mail.svg')}}" alt="" style="width: 25px;">
              </div>
            </div>
            <div style="display:table-cell" class="sm-tbl-cell">
              <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الحالة</div>

              <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                <button class="btn btn-xs btn-success rounded-lg">تم الإتصال</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="tab-pane  fade" id="customers" role="tabpanel" aria-labelledby="customers-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="text-right col-12">
          <div class="bg-white">
            <div class="pt-6">
            @foreach($buyer->reviews as $review)
            <div class="d-flex justify-content-between p-3 pl-6 mb-5" >
              <div>
                <div class="media">
                  <img style="width: 50px;" src="{{asset($review->supplier->company_logo)}}" alt="">
                  <div class="mr-2" style="font-size:13px">
                    <div class="d-flex">
                      <h6 class="ml-2">{{$review->supplier->company_name}}</h6>
                      <p class="mr-2">
                        <span  class="ml-2 fa fa-star" style="color: gold;"></span> {{$review->stars}}
                          {{$review->title}}</p>
                    </div>
                    <h6>{{$review->comment}}</h6>
                  </div>
                </div>
              </div>
              <div>
                <h6 style="font-size: xx-small;">{{$review->created_at->format('Y-m-d')}}</h6>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane  fade" id="factories" role="tabpanel" aria-labelledby="factories-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="bg-white">
          <div class="pt-6 p-4">
            <form action="{{route('dashboard.buyers.update',$buyer)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')

              <input type="hidden" value="settings"  name="settings" id="">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">إسم الشركة:</label>
                  <input type="text" name="company_name" id="name" value="{{$buyer->company_name}}" placeholder="" class="form-control rounded-lg">
                </div>
                  <div class="form-group col-md-6" style="clear: right;">
                      <label class="mb-3">شعار الشركة:</label>
                      <div class="d-flex">
                          <div>
                              <img id="personalImg" style="width: 50px;height:50px;" src="{{asset($buyer->company_logo)}}" alt="">
                          </div>
                          <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                              <div class="py-2 mx-auto">
                                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                              </div>
                              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                  <input data-imgid="#personalImg" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="company_logo">
                              </div>
                          </div>
                      </div>
                  </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">إسم الشركة:</label>
                  <select type="text" name="company_type" id="name" placeholder="" class="form-control rounded-lg">
                    <option value="trader" {{$buyer->company_type == 'trader'?'selected':''}}>تاجر</option>
                    <option value="consumer" {{$buyer->company_type == 'consumer'?'selected':''}}>مستهلك نهائي</option>
                  </select>
                </div>
            </div>
              <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane  fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="pt-6 p-4">
          <form action="{{route('dashboard.buyers.update',$buyer)}}" method="post"  enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="profile" value="profile" id="">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">إسم المستخدم:</label>
                  <input type="text" name="name" value="{{$buyer->user->name}}" id="name" placeholder="" class="form-control rounded-lg">
                </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name"> رقم الموبيل:</label>
                  <input type="text" name="mobile" value="{{$buyer->user->mobile}}" id="name" placeholder="" class="form-control rounded-lg">
                </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">  عنوان البريد الإلكتروني:</label>
                  <input type="text" name="email" value="{{$buyer->user->email}}" id="name" placeholder="" class="form-control rounded-lg">
                </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">  اللقب:</label>
                  <input type="text" name="title" value="{{$buyer->user->title}}" id="name" placeholder="" class="form-control rounded-lg">

                </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">  نبذة عن صفة المستخدم:</label>
                  <input type="text" name="summary" value="{{$buyer->user->summary}}" id="name" placeholder="" class="form-control rounded-lg">
                </div>
                  <div class="form-group col-md-6" style="clear: right;">
                      <label class="mb-3"> صورة المستخدم:</label>
                      <div class="d-flex">
                          <div>
                              <img id="personalImg" class="rounded-circle" style="width: 50px;height:50px;" src="{{asset($buyer->user->photo)}}" alt="">
                          </div>
                          <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                              <div class="py-2 mx-auto">
                                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                              </div>
                              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                  <input data-imgid="#personalImg" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="photo">
                              </div>
                          </div>
                      </div>
                  </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="name">كلمة المرور </label>
                  <input type="password" name="password" id="name" placeholder="" class="form-control rounded-lg">
                </div>
                <div class="form-group col-md-6">
                  <label class="mb-3" for="password"> إيقاف الحساب:</label>
                  <input type="checkbox" name="locked" {{$buyer->locked ? 'checked':''}} id="name" placeholder="" class="form-control rounded-lg">

                </div>
              </div>

              <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  $('form').submit(function( event ) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data: formData, // Remember that you need to have your csrf token included
        dataType: 'json',
        success: function( _response ){
            alert('تم تحديث البيانات بنجاح');
        },
        error: function( _response ){
            alert('الرجاء إختيار بيانات صالحة');
        }
    });
});
</script>
@endsection
