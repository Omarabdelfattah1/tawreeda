@extends('layouts.app')

@section('styles')
<style>
    .star-rating {
        line-height:32px;
        font-size:1.25em;
    }

    .star-rating .fa-star{color: orange;}
@media(max-width:994px){

  #categories{
    display: none !important;
  }
}

@media(max-width:575px)
{

  .card{
    width:80%
  }
}
</style>
@endsection
@section('content')



  <div class="container pt-6 mt-6">
    <div class="row mt-6 py-2 shadow-lg bg-white rounded-lg mx-4 w-100 mx-auto">
      <div class="col-lg-9 col-md-12 row pl-0"  id="media1">
        <div class="col-lg-3 col-md-5 col-sm-5 col-xs-8 text-center py-2">
          <img src="{{asset($supplier->company_logo)}}" alt="" class="w-80">

        </div>
        <div class="col-lg-9 col-md-7 col-sm-7  col-xs-8 text-right">
          <h3 class="font-weight-bold mb-3">{{$supplier->company_name}}@if($supplier->verified)<img class=" mr-2" style="width:20px;" src="{{asset('assets/xd/verified.svg')}}" alt="">@endif</h3>
          <p class="mb-3">
              {{ \Illuminate\Support\Str::limit($supplier->about, 150, $end='...') }}
          </p>
          <p class="mb-3"> <img style="width:15px;" src="{{asset('assets/xd/location.svg')}}" alt="">
            {{$supplier->company_address}}
          </p>
          <div class="lead-2 mb-3">
          @for( $i=1 ; $i <= 5; $i++ )
            @if($supplier->stars()>= $i)
              <span class="fa fa-star" style="color: #f8c848;"></span>
            @else
            <span class="fa fa-star"></span>
            @endif
          @endfor  | {{$supplier->reviews->count()}} تقييم

          </div>
          <div>
             @if($supplier->type)
            <div class="btn btn-xs mx-auto" style="color:white;background-color: #FF3737;">{{$supplier->type}}</div>
            @endif
            <div class="btn btn-xs mx-auto" style="color:white;background-color: #44485C;">{{$supplier->state}}</div>
            @if($supplier->tagproducts()->first())
            <div class="btn btn-xs btn-secondary text-default mx-auto" >{{$supplier->tagproducts()->first()->name}}</div>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12  text-right py-2 pl-0">

        <p class="mb-1 text-sm" style="vertical-align: middle;">
          @if($supplier->verified)
         <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/verified.svg')}}" alt=""> تم تأكيد بيانات الشركة عن طريق Tawreda.co
          @else
         <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/not-verified.svg')}}" alt=""> لم يتم تأكيد بيانات الشركة
          @endif
        </p>

        <p class="mb-1 text-sm" style="vertical-align: middle;">
            <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/phone.svg')}}" alt="">
            {{$supplier->user->mobile}}
        </p>
        @if($supplier->email)
        <p class="mb-1 text-sm" style="vertical-align: middle;"> <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/mail.svg')}}" alt="">{{$supplier->email}}</p>
        @endif
        <p class="mb-1 text-sm" style="vertical-align: middle;">
        @if($supplier->company_TXCard)
          <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/valid.svg')}}" alt=""> بطاقة الضريبية
          @else
          <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/not-valid.svg')}}" alt=""> بطاقة الضريبية
        @endif
        @if($supplier->company_CRN)
          <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/valid.svg')}}" alt=""> سجل تجاري
          @else
          <img style="vertical-align: middle;width: 20px;" class="py-1" src="{{asset('assets/xd/not-valid.svg')}}" alt=""> سجل تجاري
        @endif
        </p>
          <p class="mb-1 d-flex" style="vertical-align: middle; gap: 50px;font-size: 30px">
              @if($supplier->facebook)
                  <a class="social-facebook" href="{{$supplier->facebook?? 'https://www.facebook.com'}}"><i class="fa fa-facebook"></i></a>
              @endif
              @if($supplier->instagram)
                  <a class="social-instagram" href="{{$supplier->instagram?? 'https://www.instagram.com'}}"><i class="fa fa-instagram"></i></a>
              @endif
          </p>
        <div>
          <button class="ml-1 px-1 btn rounded btn-outline-primary" type="button" data-toggle="modal" @auth data-target="#review-modal" @else data-target="#login-modal" @endauth>تقييم المورد</button>
          <button class="ml-1 px-1 btn rounded btn-primary"  type="button" data-toggle="modal" @auth data-target="#contact-modal" @else data-target="#login-modal" @endauth> طلب الإتصال</button>
          <button class="ml-1 px-1 btn rounded btn-primary"  type="button" data-toggle="modal" @auth data-target="#request-modal" @else data-target="#login-modal" @endauth> أطلب عرض أسعار</button>
        </div>
      </div>
    </div>


    <div class="mt-6 card  w-100 mx-auto">
      <ul class="nav nav-tabs px-0 font-weight-bold" id="myTab" role="tablist" style="height: 60px;">
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
            عن الشركة
          </a>
        </li>
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
            المنتجات
          </a>
        </li>
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link" id="factories-tab" data-toggle="tab" href="#factories" role="tab" aria-controls="factories" aria-selected="false">
            المصانع|المخازن
          </a>
        </li>
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
          التقييمات
          </a>
        </li>
      </ul>
      <div class="tab-content mb-6 text-right" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p class="pt-3" style="line-height: 35px;">
          {{$supplier->about}}
          </p>
          <hr>
          <h6 class="mb-6 d-flex">
            <img width="25px" src="{{asset('assets/xd/management.svg')}}" alt="">
            <span class="d-inline-block py-2 mr-2 font-weight-bold">  الإدارة</span>
          </h6>
          <div class="row">
            <div class="col-lg-6 row mb-6">
              <div class="col-3">
                <img src="{{asset($supplier->user->photo)}}" alt="">
              </div>
              <div class="col-9 text-right" style="line-height: 25px;">
                <h5>{{$supplier->user->name}}</h5>
                <p>{{$supplier->user->summary}}</p>
              </div>
            </div>
            <div class="col-lg-6 row">
              <div class="col-4">
                <img src="{{asset($supplier->team_photo)}}" alt="">
              </div>
              <div class="col-8 text-right" style="line-height: 25px;">
                <h5>فريق العمل</h5>
                <p style="width:150px;">
                  {{$supplier->team_description}}
                </p>

              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
            <div class="row m-2 p-2">
                <a class="btn btn-primary btn-lg h3" href="{{asset($supplier->company_cataloge)}}" download>تحميل الكتالوج </a>
            </div>
            <hr>
          <div class="row">
            @foreach($supplier->products as $p)
            <div class="col-lg-4 col-md-6 col-12">
              <a href="{{asset('storage/'.$p->img)}}" target="_blank" class="mx-2 my-3 rounded-lg border border-secondary media">
                <img class="p-3" width="100px" src="{{asset('storage/'.$p->img)}}" alt="">
                <div class="my-6 pr-3">{{$p->name}}</div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        <div class="tab-pane fade" id="factories" role="tabpanel" aria-labelledby="factories-tab">
          @if($supplier->quality)
          <div class="row mt-6">
            <div class="col-md-6 mb-3">
              <h5 class="mb-3 d-flex">
                  <img width="25px" src="{{asset('assets/xd/award.svg')}}" alt="">
                  <span class="d-inline-block py-2 mr-2 font-weight-bold"> الجودة و مطابقة المواصفات</span>
              </h5>
              <div style="line-height: 30px;">
                {{$supplier->quality}}
              </div>
            </div>
            <div class="col-md-6 mb-3">
            @foreach($supplier->quality_files() as $file)
              <img class="d-inline-block w-20 ml-2" src="{{asset('assets/xd/photos/iso.png')}}" alt="">
              @endforeach
            </div>
          </div>
          @endif
          @if($supplier->production)
          <div class="row mt-6">
            <div class="col-md-6 mb-3">
              <h5 class="mb-3 d-flex">
                  <img width="25px" src="{{asset('assets/xd/award.svg')}}" alt="">
                  <span class="d-inline-block py-2 mr-2 font-weight-bold"> الجودة و مطابقة المواصفات</span>
              </h5>
              <div style="line-height: 30px;">
                {{$supplier->production}}
              </div>
            </div>
            <div class="col-md-6 mb-3">
            @foreach($supplier->production_files() as $file)
              <img class="d-inline-block w-20 ml-2" src="{{asset('assets/xd/photos/iso.png')}}" alt="">
              @endforeach
            </div>
          </div>
          @endif
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="row mb-6">
          <div class="col-md-3 text-center" style="line-height: 30px;">
            <h1 style="color: #f8c848;" class="lead-6 font-weight-blod text-center">{{$supplier->stars()}}/5</h1>
            <div class="lead-2 mb-3 mt-4 text-center">
              @for( $i=1 ; $i <= 5; $i++ )
              @if($supplier->stars()>= $i)
                <span class="fa fa-star" style="color: #f8c848;"></span>
              @else
              <span class="fa fa-star"></span>
              @endif
              @endfor
            </div>
            <h6 class=" text-center">{{$supplier->reviews->count()}} تقييم</h6>
          </div>
          <div class="col-md-9">
            <div>
              <span class="">5</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;position: relative;height: 11px;width:{{$supplier->reviews->where('stars',5)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{$supplier->reviews->where('stars',5)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">4</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{$supplier->reviews->where('stars',4)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{$supplier->reviews->where('stars',4)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">3</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{$supplier->reviews->where('stars',3)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{$supplier->reviews->where('stars',3)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">2</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{$supplier->reviews->where('stars',2)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{$supplier->reviews->where('stars',2)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">1</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{$supplier->reviews->where('stars',1)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{$supplier->reviews->where('stars',1)->count()}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        @foreach($supplier->reviews as $review)
        <div class="d-flex justify-content-between text-sm border-bottom mb-2">
          <div class="mb-2">
            <h6 class="mb-3">
              <span class="fa fa-star" style="color: gold;"></span> {{$review->stars}}
              {{$review->title}}
            </h6>
            <h6> {{$review->comment}}</h6>
          </div>
          <div>
            <h6 class="mb-1" style="font-size: xx-small;">
            {{$review->created_at->format('Y-m-d')}}
            <form class="form-inline" action="{{route('report')}}" method="post">
              @csrf
               <input type="hidden" name="type" value="تقييم" id="">
               <input type="hidden" name="userable_type" value="App\Models\Review" id="">
               <input type="hidden" name="userable_id" value="{{$review->id}}" id="">
              <button class="btn btn-none text-primary p-0" href="" class="text-primary mr-2"><span class="fa fa-flag"></span> تبليغ</button>
            </form>
            </h6>
            <h6 class="mb-1"> {{$review->buyer->user->name}}</h6>
          </div>
        </div>
        @endforeach

        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
    <script>
        var $star_rating = $('.star-rating .fa');

        var SetRatingStar = function() {
            return $star_rating.each(function() {
                if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                    return $(this).removeClass('fa-star-o').addClass('fa-star');
                } else {
                    return $(this).removeClass('fa-star').addClass('fa-star-o');
                }
            });
        };

        $star_rating.on('click', function() {
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
        });

        SetRatingStar();
        $(document).ready(function() {

        });
    </script>
@endsection
@guest
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="checkLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="loginForm" class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold d-none">
      <div class="modal-header" style="border-bottom: 0px;">
        <h5 class="modal-title lead-6 text-primary font-weight-bold " id="loginLabel">عندك حساب؟</h5>
      </div>
      <div class="modal-body rounded-lg">
        <!-- form  -->
        <form action="{{route('login')}}" method="post" class="mx-auto input-border">
          @csrf
          <div class="form-group clear-both">
            <label for="phone-email" class="float-right mb-5">رقم الموبيل</label>
            <input id="phone-email" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
          </div>

          <div class="form-group">
            <label for="password" class="float-right mb-5">الرقم السري</label>
            <input id="password" type="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="كلمة المرور">
          </div>
          <div class="form-group ">
{{--            <p class="small mt-3 opacity-70  text-right"><a href="#"> نسيت كلمة المرور؟</a></p>--}}
            <button id="btn-login" class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" >سجل دخول</button>
            <p class="small mt-3 opacity-70  text-right mt-5">معندكش حساب؟ <a class="btn btn-none text-primary" onclick="show('registerForm','loginForm')">أنشئ دلوقتي </a></p>
          </div>
{{--          <p  class="text-default mt-6" style="font-size: 10px;">من خلال التسجيل فأنت توافق على <a class="text-primary" href="">شروط الإستخدام</a>&nbsp; و &nbsp;<a class="text-primary" href="">سياسة الخصوصية</a> </p>--}}

        </form>
        <!-- end-form -->
      </div>
    </div>
        <div id="registerForm" class="modal-content text-right pb-1 rounded-lg font-weight-bold">
          <div class="modal-header" style="border-bottom: 0px;">
            <h5 class="modal-title lead-6 text-primary font-weight-bold " id="loginLabel">إنشيء حساب</h5>
          </div>
          <div class="modal-body rounded-lg">
              <p>
                  عندك حساب؟ <a class="btn btn-none text-primary" onclick="show('loginForm','registerForm')">
                      تسجيل دخول </a>
              </p>
            <!-- form  -->
              <form method="post" class=" mx-auto input-border" action="{{route('register')}}" enctype="multipart/form-data">
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
                                  <img  class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                              </div>
                              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                  <input data-imgid="#previewLogo" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="company_logo">
                              </div>
                          </div>
                      </div>
                      <img  id="previewLogo" src="" style="max-width: 50px !important;">
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
                                  <input data-imgid="#personalImg" type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="photo">
                              </div>
                          </div>
                          <img  id="personalImg" src="" style="max-width: 50px !important;">
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
              <!-- end-form -->
          </div>
        </div>
  </div>
</div>
@else
  <div class="modal fade" id="review-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold">
        <div class="modal-header" style="border-bottom: 0px;">
          <h5 class="modal-title lead-6 text-primary font-weight-bold " id="reviewLabel">تقييم المورد</h5>
        </div>
        <div class="modal-body rounded-lg">
          <!-- form  -->
          <form action="{{route('buyer.review',$supplier)}}" method="post" class="mx-auto input-border">
            @csrf

            <div class="form-group clear-both">
              <label for="title" class="float-right mb-5">العنوان</label>
              <input id="title" name="title" class="form-control form-control-lg rounded-lg border border-secondary">

            </div>

            <div class="form-group">
              <label for="password" class="float-right mb-5">التقييم</label>
                <div class="col-lg-12">
                <div class="star-rating">
                    <span class="fa fa-star-o" data-rating="1"></span>
                    <span class="fa fa-star-o" data-rating="2"></span>
                    <span class="fa fa-star-o" data-rating="3"></span>
                    <span class="fa fa-star-o" data-rating="4"></span>
                    <span class="fa fa-star-o" data-rating="5"></span>
                    <input type="hidden" name="stars" class="rating-value" value="0">
                </div>
            </div>

            </div>
            <div class="form-group clear-both">
              <label for="comment" class="float-right mb-5">التعليق</label>
              <textarea id="comment" name="comment" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="قم بكتابة التعليق"></textarea>

            </div>
            <div class="form-group ">
              <button class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5"> إرسال</button>
            </div>
          </form>
          <!-- end-form -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold">
        <div class="modal-header" style="border-bottom: 0px;">
          <h5 class="modal-title lead-6 text-primary font-weight-bold " id="reviewLabel">طلب إتصال</h5>
        </div>
        <div class="modal-body rounded-lg">
          <!-- form  -->
          <form action="{{route('buyer.call',$supplier)}}" method="post" class="mx-auto input-border px-6">
            @csrf
            <div class="form-group clear-both">
              <label for="date" class="mb-5">التاريخ</label>
              <input id="date" name="date" type="date" class="form-control border border-secondary">

            </div>

            <div class="form-group">
              <label for="password" class="mb-5">التوقيت المناسب</label>
              <div class="row">
                <div class="col">
                من
                  <input type="time" name="from_time" style="width:150px" class="form-control border border-secondary d-inline">
                </div>
                <div class="col">
                حتى
              <input type="time" name="to_time" style="width:150px" class="form-control border border-secondary d-inline">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="comment" class="mb-5">وسيلة التواصل المفضلة</label>
              <select name="way" id="" class="form-control border border-secondary">
                <option value="phone">إتصال</option>
                <option value="whatsapp">واتساب</option>
                <option value="email">إيميل</option>
              </select>
            </div>
            <div class="form-group ">
              <button class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" > إرسال</button>
            </div>
          </form>
          <!-- end-form -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="request-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content text-right p-2 pb-1 rounded-lg font-weight-bold">
        <div class="modal-header" style="border-bottom: 0px;">
          <h5 class="modal-title lead-6 text-primary font-weight-bold " id="reviewLabel">عندك حساب؟</h5>
        </div>
        <div class="modal-body rounded-lg">
          <!-- form  -->
          <div class="mx-auto input-border">

            <div class="form-group clear-both">
              <label for="title" class="float-right mb-5">العنوان</label>
              <select id="title" name="title" class="form-control form-control-lg rounded-lg border border-secondary">
                <option value=""></option>
              </select>
            </div>

            <div class="form-group">
              <label for="password" class="float-right mb-5">التقييم</label>
              <div class="stars">
                <input class="star star-5" id="star-5" type="radio" name="review"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="review"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="review"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="review"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="review"/>
                <label class="star star-1" for="star-1"></label>
              </div>
            </div>
            <div class="form-group clear-both">
              <label for="comment" class="float-right mb-5">التعليق</label>
              <textarea id="comment" name="comment" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="قم بكتابة التعليق"></textarea>
            </div>
            <div class="form-group ">
              <button class="btn rounded-lg btn-xl btn-primary d-block ml-auto mt-5" data-toggle="modal" data-target="#end" > إرسال</button>
            </div>
          </div>
          <!-- end-form -->
        </div>
      </div>
    </div>
  </div>
@endguest
