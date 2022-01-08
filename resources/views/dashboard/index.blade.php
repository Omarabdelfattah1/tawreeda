@extends('layouts.dashboard')
@section('content')

        <div class="col-12 d-flex justify-content-between text-right" style="font-size:30px;">
          نظرة عامة
        </div>

        <div class="col-12 row mt-6 ">
          
          <div class="col-lg-5">
            <div class="font-weight-bold row">
              إحصائيات

            </div>
            <div class="row mt-2">
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/supplier.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #78D25B;" class="font-weight-bold mb-0">{{$suppliers_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد الموردين</p>
                  </div>
                </div>
              </div>
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/investor-home.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #FF6A00;" class="font-weight-bold mb-0">{{$buyers_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد المشترين</p>
                  </div>
                </div>
              </div>
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/outline.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #6257F7;" class="font-weight-bold mb-0">{{$requests_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد طلبات الأسعار</p>
                  </div>
                </div>
              </div>
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/menu.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #78D25B;" class="font-weight-bold mb-0">{{$departments_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد الأقسام</p>
                  </div>
                </div>
              </div>
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/menu.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #FF6A00;" class="font-weight-bold mb-0">{{$categories_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد الفئات</p>
                  </div>
                </div>
              </div>
              <div class="col-6 my-1 ">
                <div class="media bg-white py-4 px-3 text-center rounded-lg mb-1">
                  <img class="ml-2 my-2" src="{{asset('assets/xd/alert-home.svg')}}" style="width:30px;" alt="">
                  <div>
                    <p style="font-size: 20px;color: #6257F7;" class="font-weight-bold mb-0">{{$reports_count}}</p>
                    <p class="font-weight-bold mb-1" style="font-size: 13px;">عدد البلاغات</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 md-m-3" >
            @if($requests->count())
            <div class="row justify-content-between">
              <p class="font-weight-bold mb-3" >أخر طلبات العروض</p>
              <a href="{{route('dashboard.requests.index')}}" class="font-weight-bold">عرض الكل</a>
            </div>
            @foreach($requests as $request)
            <div class="row bg-white mb-3 rounded-lg pb-0 pl-0 pr-3">
            <div class="col-md-2 text-center py-3"><img  style="width: 70px;" src="{{asset($request->buyer->company_logo)}}" alt=""></div>
            <div class="col-md-8 pr-0">
              <h6 class="py-1 font-weight-bold">
                {{$request->buyer->company_name}}              
              </h6>
              <p style="line-height: 1rem;font-size: 10px;">{{$request->description}}</p>
              <div class="row mt-3">
                <div class="col-md-4 media mb-3">
                  <img style="width:15px;height:15px" class="ml-2 rounded-lg" src="{{asset($request->buyer->user->photo)}}" alt="">
                  <h6 style="font-size: 10px;" class="font-weight-bold">{{$request->buyer->user->name}}</h6>
                </div>
                <div class="col-md-3 media mb-3">
                  <img style="width:15px;" class="ml-2" src="{{asset('assets/xd/clock.svg')}}" alt="">
                  <h6 style="font-size: 10px;" class="font-weight-bold">{{$request->created_at->diffForHumans()}}</h6>
                </div>
                <div class="col-md-5 media mb-3">
                  <img style="width:15px;" class="ml-2" src="{{asset('assets/xd/box.svg')}}" alt="">
                  <h6 style="font-size: 10px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
                </div>
              </div>
            </div>
            <div class="col-md-2 py-2 pl-2">
              <div class="media mb-5 mt-1">
                <img style="width:15px;" class="" src="{{asset('assets/xd/box.svg')}}" alt="">
                <h6 style="font-size: 10px;" class="font-weight-bold">  عروض مقدمة</h6>
              </div>
              <a href="{{route('dashboard.requests.show',$request)}}" class="mx-4 text-primary rounded-lg px-2 pt-1 pb-2" style="background-color: #FFF7F2;">العروض</a>

            </div>
            </div>
            @endforeach
            @else

            لا يوجد طلبات أسعار
            @endif
          </div>
        </div>
      
      @endsection