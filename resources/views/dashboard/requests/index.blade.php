@extends('layouts.dashboard')
@section('content')
<div class="col-12 justify-content-between text-right" style="font-size:30px;">
          نظرة عامة
        </div>


        <div class="pt-6 row ">
          @foreach($requests as $request)
          <div class="col-12 row m-3 bg-white">
            <div class="col-md-2 tex2-center py-3"><img  style="width: 100px;" src="{{asset('storage/'.$request->buyer->company_logo)}}" alt=""></div>
            <div class="col-md-8">
              <h6 class="py-1 font-weight-bold">
                {{$request->buyer->company_name}}              
              </h6>
              <p style="line-height: 1rem;font-size: 12px;">{{$request->description}}</p>
              <div class="row mt-3">
                <div class="col-md-4 media mb-3">
                  <img style="width:20px;" class="ml-2" src="{{asset('storage/'.$request->buyer->user->photo)}}" alt="">
                  <h6 style="font-size: 12px;" class="font-weight-bold">{{$request->buyer->user->name}}</h6>
                </div>
                <div class="col-md-3 media mb-3">
                  <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/clock.svg')}}" alt="">
                  <h6 style="font-size: 12px;" class="font-weight-bold">{{$request->created_at->diffForHumans()}}</h6>
                </div>
                <div class="col-md-5 media mb-3">
                  <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/box.svg')}}" alt="">
                  <h6 style="font-size: 12px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
                </div>
              </div>
            </div>
            <div class="col-md-2 py-2">
              <div class="media">
                <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/box.svg')}}" alt="">
                <h6 style="font-size: 12px;" class="font-weight-bold">  عروض مقدمة</h6>
              </div>
              <a href="{{route('dashboard.requests.show',$request)}}" class="btn mt-5 mx-4 text-primary" style="background-color: #FFF7F2;">العروض</a>

            </div>
          </div>
          @endforeach
        </div>
      @endsection