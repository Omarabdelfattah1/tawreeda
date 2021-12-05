@extends('supplier.index')
@section('dash-content')

  <div class="text-right col-12">
    <h6 class="d-flex rounded-top py-3 mb-0 px-4 font-weight-bold text-primary shadow-lg" style="background-color: white; width: 175px;">
      التقييمات المرسلة
    
    </h6>
    <div class="bg-white">
      <div class="px-4 py-5">
        <div class="row mb-6">
          <div class="col-md-3 text-center" style="line-height: 30px;">
            <h1 style="color: #f8c848;" class="lead-6 font-weight-blod text-center">{{auth()->user()->userable->stars()}}/5</h1>
            <div class="lead-2 mb-3 mt-4 text-center">
              @for( $i=1 ; $i <= 5; $i++ )
              @if(auth()->user()->userable->stars()>= $i)
                <span class="fa fa-star" style="color: #f8c848;"></span>
              @else
              <span class="fa fa-star"></span>
              @endif
              @endfor                
            </div>
            <h6 class=" text-center">{{auth()->user()->userable->reviews->count()}} تقييم</h6>
          </div>
          <div class="col-md-9">
            <div>
              <span class="">5</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;position: relative;height: 11px;width:{{auth()->user()->userable->reviews->where('stars',5)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{auth()->user()->userable->reviews->where('stars',5)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">4</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{auth()->user()->userable->reviews->where('stars',4)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{auth()->user()->userable->reviews->where('stars',4)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">3</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{auth()->user()->userable->reviews->where('stars',3)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{auth()->user()->userable->reviews->where('stars',3)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">2</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{auth()->user()->userable->reviews->where('stars',2)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{auth()->user()->userable->reviews->where('stars',2)->count()}}</span>
                </div>
              </div>
            </div>
            <div>
              <span class="">1</span>
              <div style="background-color: #f3f3f3;" class="mt-3 border rounded-lg bg-default d-inline-block w-90">
                <div style="background-color: #f8c848;height: 11px;position: relative;width:{{auth()->user()->userable->reviews->where('stars',1)->count()*20}}%;min-width:38px;" class="rounded-lg">
                  <img src="{{asset('assets/xd/reveiws.png')}}" class="rounded-lg" alt="" style="position: absolute;left:0;height: 12px;">
                  <span style="position: absolute;left:15px;font-size: xx-small;">{{auth()->user()->userable->reviews->where('stars',1)->count()}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        @foreach(auth()->user()->userable->reviews as $review)
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

@endsection