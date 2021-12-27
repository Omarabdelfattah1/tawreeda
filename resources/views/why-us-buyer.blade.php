@extends('layouts.app')

@section('content')
  <header class="header pb-5">
    <div class="container text-center">
      <div class="row mx-auto">
        <div class="col-lg-5 col-md-12 col-sm-12 mt-auto">
          <img style="width: 100%;" src="assets/xd/imgs/confused.png" alt="">
        </div>
        <div class="col-lg-7 col-md-12">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="mt-sm-5">
                <h1 class="text-primary lead-6 font-weight-bold mb-5">بتدور على منتج؟</h1>
                <h1 class="text-default lead-2">إختيارات أكتر, ثقة أكبر, تواصل أسرع</h1>
              </div>
              <div class="card p-4 shadow-lg mt-5">
                <h1 class="mx-auto lead-1" style="width:40%">
                  <img src="assets/xd/save-time.png" alt="" style="display: block;"> حفظ للوقت
                </h1>
                <p class="mt-5">بتجمع ارقام من النت وبتكلم ناس كتير
                  بس بتضيع وقت ومش قادر تتابع مع كل دول</p>
              </div>
              <div class="card p-4 shadow-lg mt-5">
                <h1 class="mx-auto lead-1"  style="width:40%">
                  <img src="assets/xd/review.png" alt="" style="display: block;"> تقييم العملاء
                </h1>
                <p class="mt-5">عندك موردين ثابتين بس تتمنى تزود عدد الموردين عشان تجيب اسعار افضل او خامات احسن</p>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 mt-5">
              <div class="card p-4 shadow-lg">
                <h1 class="mx-auto lead-1"  style="width:40%">
                  <img src="assets/xd/new-suppliers.png" alt="" style="display: block;"> موردين جدد
                </h1>
                <p class="mt-5">لقيت حد بأسعار كويسة جداً من الفيسبوك بس هو في محافظة تانية ومش قادر تسأل عليه عشان تطَّمنله</p>
              </div>
              <div class="card p-4 shadow-lg mt-5">
                <h1 class="mx-auto lead-1"  style="width:40%">
                  <img src="assets/xd/icons/save.png" alt="" style="display: block;">  توفير
                </h1>
                <p class="mt-5">عندك موردين ثابتين بس تتمنى تزود عدد الموردين عشان تجيب اسعار افضل او خامات احسن</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="{{route('request')}}" class="px-6 py-2 mx-auto mt-6 lead-3 btn rounded-lg btn-primary">أطلب عرض أسعار</a>
      <h1 class="mt-6 pt-6 mx-auto lead-3 text-default">لو بتدور على منتج، توريدة هتقدملك ايه ؟</h1>

      <div class="row mt-6 pt-6">
        <div class="col-md-6">
          <div class="row">
            <div class="col-9 mx-auto">
              <div class="card mb-4 border border-primary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 text-primary mb-3 font-weight-bold">طلب عرض أسعار</h1>
                <p class=" text-secondry">مش محتاج تضيع وقت، تقدر تطلب عرض اسعار لموردين كتير في نفس الوقت بضفطة واحدة من تلفونك</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold">مشاهدة تقييمات المشترين</h1>
                <p class=" text-secondry">تقدر تشوف تقيمات ناس اشترت قبل كده لأي مورد عشان تطمن</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold">تواصل سهل و مباشر</h1>
                <p class=" text-secondry">التواصل سهل و من غير مكالمات، عرض الاسعار هيوصلك على صفحتك و تشوفه من موبايلك</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold">ضمان المورد</h1>
                <p class=" text-secondry">بادج التأكيد حيعرفك ان المورد ده معتمد عن طريق توريدة و ان بياناته تمت مراجعتها</p>
              </div>
            </div>
            <div class="col-3" style="margin-top: 60px;">
              <span class="dot mx-auto border-primary"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
            </div>
          </div>
        </div>
        
        <div class="col-md-6" style="position: relative;">
          <img src="assets/xd/offers.png" alt="">
        </div>
      </div>
    </div> 
      
  </header>
@endsection