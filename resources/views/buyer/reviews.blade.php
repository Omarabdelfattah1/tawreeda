@extends('buyer.index')
@section('dash-content')
  <div class="text-right col-12">
    <h6 class="d-flex rounded-top py-3 mb-0 px-4 font-weight-bold text-primary shadow-lg" style="background-color: white; width: 175px;">
      التقييمات المرسلة
    
    </h6>
    <div class="bg-white">
      <div class="pt-6">
        @if(auth()->user()->userable->reviews)
        @foreach(auth()->user()->userable->reviews as $review)
        <div class="d-flex justify-content-between p-3 pl-6 mb-5" >
          <div>
            <div class="media">
              <img style="width: 50px;" src="{{asset('storage/'.$review->supplier->company_logo)}}" alt="">
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
        @else
        <div>
        لم تقم بعمل أي تقييمات
        </div>
        @endif
      </div>
    </div>
  </div>

@endsection