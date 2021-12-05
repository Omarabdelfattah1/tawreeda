@extends('layouts.app')
@section('styles')
<style>
  @media (max-width:1200px) { 

    #bg-sells{
      display: none;
    }
    .media{
      margin: 10px;
      padding-top: 15px;
      padding-bottom: 15px;
    }
    .media h1{
      margin-bottom: 10px;
    }

  }
  
  @media (max-width:767px) { 
    .card{
      width: 75%;
      padding: 3%;
      margin: auto;
      font-style: bold;
    }

    #sec-2 .card{
      width: 90%;
    }
    #sec-2 .col-2{
      margin-right: auto;
      padding-left: 0px;
    }
    #middle{
      order: -1;
    }
  }
  @media (min-width:1201px) { 
    #media1{
      position: absolute;top: 14%;right:50%;
    }
    #media2{
      position: absolute;top: 37%;right: 62%;
    }
    #media3{
      position: absolute;bottom: 33%;right: 62%
    }
    #media4{
      position: absolute;bottom: 9%;right: 54%;
    }
  }
  .dot {
    height: 10px;
    width: 10px;
    border: solid 2px;
    border-radius: 50%;
    display: block;
  }
  .vl{
    display: block;
    height: 25%;
    width: 2px;
    background-color:#707070;
  }
</style>
@endsection

@section('content')


<header class="header pb-5">
    <div class="container text-center" id="sec-1">
      <div class="row">
        <div class="col-md-4 mt-6">
          <div style="line-height: 22px;" class="card p-6 shadow-lg">
            <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/new-clients.svg" alt="">
            <h1 class="mx-auto lead-1 font-weight-bold"> عملاء جدد
            </h1>
            <p class="mt-5">لقيت حد بأسعار كويسة جداً من الفيسبوك بس هو في محافظة تانية ومش قادر تسأل عليه عشان تطَّمنله</p>
          </div>
          <div style="line-height: 22px;" class="card p-6 shadow-lg mt-5">
            <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/new-suppliers.svg" alt="">
            <h1 class="mx-auto lead-1 font-weight-bold"> أفكار جديدة و مبتكرة
            </h1>
            <p class="mt-5">عندك افكار قوية لتسويق منتجك
              بس اغلب الاعلانات غالية ومش دايما مفيدة</p>
          </div>
        </div>
        <div class="col-md-4" id="middle">
          <div class="mb-6">
            <h1 class="text-primary lead-6 font-weight-bold text-center">مورد؟</h1>
            <p class="lead-1 mt-5  text-center">بيع <span class="text-primary font-weight-bold">أكتر </span> بيع <span class="text-primary font-weight-bold">أسرع</span></p>
          </div>
          <div style="line-height: 22px;" class="card p-6 shadow-lg">
            <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/save-time.svg" alt=""> 
            
            <h1 class="mx-auto lead-1 font-weight-bold">متابعة سريعة
            </h1>
            <p class="mt-5">متابع الفيسبوك و جروبات الواتساب بس مش ملاحق على كل الصفحات ومش كل الناس بترد</p>
          </div>
          <div style="line-height: 22px;" class="card p-6 shadow-lg mt-6">
              <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/review.svg" alt="">
            <h1 class="mx-auto lead-1 font-weight-bold" >  تقييم العملاء
            </h1>
            <p class="mt-5">عملاءك بيشكروا فيك وفي خدمتك
              بس مش لاقي حته تظهر فيها الردود ديه</p>
          </div>
        </div>
        <div class="col-md-4 mt-5">
          <div style="line-height: 22px;" class="card p-6 shadow-lg">
              <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/safe.svg" alt="">
            <h1 class="mx-auto lead-1 font-weight-bold" >عرض منظم و أمن
            </h1>
            <p class="mt-5">عندك منتجات كتير واحسن من منافسينك بس  مش عارف تعرضها فين بشكل منظم يكون ظاهر للناس كلها</p>
          </div>
          <div style="line-height: 22px;" class="card p-6 shadow-lg mt-5">
              <img class="mx-auto mb-2 w-25 d-block" src="assets/xd/save.svg" alt="">
            <h1 class="mx-auto lead-1 font-weight-bold" >  توفير
            </h1>
            <p class="mt-5">عندك موردين ثابتين بس تتمنى تزود عدد الموردين عشان تجيب اسعار افضل او خامات احسن</p>
          </div>
        </div>
      </div>
      <h1 class="mt-6 py-6 mx-auto lead-4 text-default text-center" style="line-height: 35px;">لو انت مورد او مصنع توريدة هتقدملك ايه ؟</h1>

      <div class="row mt-6 pt-6"  id="sec-2">
        <div class="col-md-6" style="position: relative;">
          <img src="assets/xd/supplier.png" alt="">
        </div>
        <div class="col-md-6" style="margin-top: 60px;" id="">
          <div class="row">
            <div class="col-2" >
              <span class="dot mx-auto border-primary mt-5"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
              <span class="vl mx-auto"></span>
              <span class="dot mx-auto"></span>
            </div>
            <div class="col-10"  id="sec-2">
              <div class="card mb-4 border border-primary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 text-primary mb-3 font-weight-bold">صفحة خاصة بشركتك</h1>
                <p class=" text-secondry">هيكون عندك الصفحة الخاصة بشركتك تعرض عليها منتجاتك و ايه الي بتقدمه</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold">تقييم العملاء</h1>
                <p class=" text-secondry">عملاء يقدروا يكتبوا تقييم عن قوة منتجك و يدوا ثقة لعملاء جديدة فيك</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold">عرض أسعار</h1>
                <p class=" text-secondry">ناس أكتر هتعرف عنك عن طريق خدمة طلبات الأسعار على الموقع و هيحيلك طلب العميل لحد عندك من غير اي مجهود اضافي او موظفين</p>
              </div>
              <div class="card mb-4 border border-secondary p-3" style="text-align: right;line-height:25px;" >
                <h1 class="lead-1 mb-3 font-weight-bold"> مورد معتمد</h1>
                <p class=" text-secondry">هيتيح ليك فرصة انك تكون مورد معتمد عن طريق منحك شارة و بكده العملاء يثقوا فيك أكتر</p>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      <h1 class="lead-6 font-weight-bold my-6  text-center">
        وفَّر اكتر من <span class="text-primary">11 الف جنيه كل شهر</span>
      </h1>
      <p class="lead-3 font-weight-bold mb-6 text-center" style="line-height: 35px;">اوصل لعملاء جديدة، اعرض منتجاتك بالشكل اللي يليق بيك!</p>
      <div style="position: relative;"  id="sec-3">
        <img id="bg-sells" src="assets/xd/imgs/bg-sells.png" alt="" style="width: 80%; margin-left: 20%;" >
        <div class="media" id="media1">
          <img style="max-width:45px;" src="assets/xd/employee.svg" alt="" class="pull-right ml-2">
          <div class="media-body text-right">
            <h1 class="font-weight-bold mb-0 lead-1">أكتر من <span class="text-primary">7000</span> جنية شهرياً</h1>
            <p>اقل رقم حتصرفوا عشان تجيب مندوب مبيعات بمصاريفه</p>
          </div>
        </div>
        <div class="media" id="media2">
          <img style="max-width:45px;" src="assets/xd/facebook.svg" alt="" class="pull-right ml-2">
          <div class="media-body text-right">
            <h1 class="font-weight-bold mb-0 lead-1">أكتر من <span class="text-primary">3000</span> جنية شهرياً</h1>
            <p>اقل رقم حتصرفوا عشان تجيب مندوب مبيعات بمصاريفه</p>
          </div>
        </div>
        <div class="media" id="media3">
          <img style="max-width:45px;" src="assets/xd/mobile-phone.svg" alt="" class="pull-right ml-2">
          <div class="media-body text-right">
            <h1 class="font-weight-bold mb-0 lead-1">أكتر من <span class="text-primary">1000</span> جنية شهرياً</h1>
            <p>اقل رقم حتصرفوا عشان تجيب مندوب مبيعات بمصاريفه</p>
          </div>
        </div>
        <div class="media" id="media4">
          <img style="max-width:45px;" src="assets/xd/work.svg" alt="" class="pull-right ml-2">
          <div class="media-body text-right">
            <h1 class="font-weight-bold mb-0 lead-1">أكتر من <span class="text-primary">30 ساعة شهرية</span> </h1>
            <p>اقل رقم حتصرفوا عشان تجيب مندوب مبيعات بمصاريفه</p>
          </div>
        </div>
      </div>
      <a href="join-us-suppliers.html" class="py-3 px-6 mx-auto mt-6 lead-3 btn rounded-lg btn-primary font-weight-bold"> إنضم إلينا</a>
    </div> 
      
  </header>
@endsection