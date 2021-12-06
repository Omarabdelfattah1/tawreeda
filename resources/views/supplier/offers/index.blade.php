@extends('supplier.index')
@section('dash-content')

<div class="d-flex">
  <a href="{{route('supplier.requests.index')}}" class="rounded-top py-3 px-6 font-weight-bold  text-default ml-3" style="background-color:gainsboro;height: 45px;">
    المستقبلة
    <span class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:xx-small;height: 12px;width:12px;">3</span>
  
  </a>
  <a href="{{route('supplier.offers.index')}}" class="d-flex lead-1 rounded-top py-3 px-6 font-weight-bold text-primary " style="background-color:  white;width: 110px;">
    المرسلة
  </a>
</div>
<div class="bg-white">
  <div class="pt-2">
    @if(count($offers))
  @foreach($offers as $offer)
    <div class="row m-3" style="background-color: #FAFAFA">
      <div class="col-md-2 p-2 text-center"><img class="mr-3" style="width: 100px;" src="{{asset('storage/'.$offer->request->buyer->company_logo)}}" alt=""></div>
      <div class="col-md-8">
        <h6 class="py-3 font-weight-bold">
          {{$offer->request->buyer->company_name}}
        </h6>
        <p style="line-height: 1rem;font-size: 12px;">{{$offer->request->description}}</p>
        <div class="row mt-3">
          <div class="col-md-4 media mb-3">
            <img style="width:20px;" class="ml-2" src="{{asset('storage/'.$offer->request->buyer->user->photo)}}">
            <h6 style="font-size: 12px;" class="font-weight-bold">{{$offer->request->buyer->user->name}}</h6>
          </div>
          <div class="col-md-3 media mb-3">
            <img style="width:20px;" class="ml-2" src="../assets/xd/clock.svg" alt="">
              
            <h6 style="font-size: 12px;" class="font-weight-bold">{{$offer->request->created_at->diffForHumans()}}</h6>
          </div>
          <div class="col-md-5 media mb-3">
            <img style="width:20px;" class="ml-2" src="../assets/xd/cup.png" alt="">
            <h6 style="font-size: 12px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
          </div>
        </div>
      </div>
      <div class="col-md-2 py-4">
        <a href="{{route('supplier.offers.show',$offer)}}" class="btn mt-5 mx-4 text-primary" style="background-color: #FFF7F2;">التفاصيل</a>

      </div>
    </div>
  @endforeach
  @else
  <div class="row m-3" style="background-color: #FAFAFA">
    لا يوجد عروض

  </div>
  @endif
  </div>
</div>

@endsection