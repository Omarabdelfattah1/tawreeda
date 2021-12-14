@extends('buyer.index')

@section('styles')
<style>
      @media( max-width:1000px){
      .navbar-left{
        width: 100%;
      }
    }
    #myTab .active{
      border-top:0 ;
      color: #FF6A00;
      border-bottom:2px solid #FF6A00; 
    }
    @media(max-width:515px)
    {
      #myTab{
        font-size: 10px !important;
      }
      #myTab a{
        padding-left: 4px;
        padding-right: 4px;
      }
    }
    @media(max-width:994px){

      #categories{
        display: none !important;
      }
      
      
    }
</style>
@endsection
@section('dash-content')

<div class="d-flex text-right">
  <a href="{{route('buyer.requests.index')}}" class="rounded-top py-3 px-6 font-weight-bold  text-primary ml-3" style="background-color:white;height: 45px;">
    المستقبلة
    <span class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:xx-small;height: 12px;width:12px;">3</span>
  
  </a>
</div>
<div class="bg-white text-right">
  <div class="pt-3">
    <div class="row flex-warp m-3 border-bottom" >
      <div class="col-md-9 media">
        <img class="m-3" style="width: 70px;" src="{{asset('storage/'.$request->buyer->company_logo)}}" alt="">
        <div class="">
          <h6 class="py-3 font-weight-bold">
          {{$request->buyer->company_name}}
          
          </h6>
          <div class="row mr-1  mt-3">
            <div class="media ml-3 mb-3">
              <img style="width: 20px;" class="ml-2" src="{{asset('storage/'.$request->buyer->user->photo)}}" alt="">
              <div>
                <h6 style="font-size: 12px;" class="font-weight-bold mb-1">{{$request->buyer->user->name}}</h6>
                <p style="font-size: 10px;" >{{$request->buyer->user->summary}}</p>
              </div>
            </div>
            <div class="media">
              <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/phone.svg')}}" alt="">
              <h6 style="font-size: 12px;" class="ml-2">{{$request->buyer->user->mobile}}</h6>
              <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/whatstapp.svg')}}" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="p-2 col-md-3 text-left">
        <div class="media mb-6">
          <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/clock.png')}}" alt="">
          <h6 style="font-size: 12px;" class="font-weight-bold">{{$request->created_at->diffForHumans()}}</h6>
        </div>
        <div class="media">
          <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/cup.png')}}" alt="">
          <h6 style="font-size: 12px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
        </div>
      </div>
    </div>
    <div class="row m-3 justify-content-between border-bottom pb-3">
      <div class="col-md-6">
        <h6 class="mb-6">التفاصيل:</h6>
        <p style="line-height: 20px;">
        {{$request->description}}
        </p>
      </div>
      <div class="col-md-5 " style="background-color: #FAFAFA">
        <h6 >المرفقات:</h6>
        
        @foreach($request->files as $file)
        <div  class="d-flex mt-6 justify-content-between rounded-lg p-4" style="border: 2px solid #C39B324F !important">
          <div class="media">
              <img src="{{asset('assets/xd/attachment-pdf.svg')}}" style="width: 40px;" class="ml-2" alt="">
              <div>
                <h6 class="mb-3">Document File</h6>
                <p style="font-size: xx-samall;">{{size('storage/'.$file->path)}}</p>
              </div>
          </div>
          <a href="{{asset('storage/'.$file->path)}}" target="_blank" class="btn btn-default" style="padding: 0;font-size: 20px;" download>
            
            <i class="fa fa-download text-primary" ></i>
          </a>                    
        </div>
        @endforeach
      </div>
    </div>
    <div class="row m-3 card border rounded">
      <ul class="nav nav-tabs px-0 font-weight-bold " id="myTab" role="tablist" style="height: 60px;">
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
            جميع العروض
          </a>
        </li>
        <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
          <a  style="height: 100%;line-height: 30px;" class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
            العروض المفضلة
          </a>
        </li>
      </ul>
      <div class="tab-content mb-6 text-right px-5 " id="myTabContent">
        <div class="tab-pane fade show active px-4 pt-2" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row justify-content-between">
            @if($request->offers()->count())
            @foreach($request->offers as $offer)
            <div class="col-md-6 row mb-4 " style="background-color: #FAFAFA;">
              <div class="col-md-3 px-0">
                <img class="my-6" src="{{asset('storage/'.$offer->supplier->company_logo)}}" style="width: 130px;" alt="">
              </div>
              <div class="col-md-7 py-5">
                <h6 class="font-weight-bold mb-5">{{$offer->supplier->company_name}}</h6>
                <p class="mb-5" style="font-size: 13px;">{{$offer->supplier->about}}</p>
                <p class="mb-5" style="font-size: 13px;">
                  <img src="{{asset('assets/xd/location.svg')}}" style="width: 12px;" alt="">
                  {{$offer->supplier->company_address}}
                </p>
                <div class="d-flex justify-content-between">
                  <div class="media">
                    <img class="my-2 ml-1" style="width: 13px;" src="{{asset('assets/xd/clock.svg')}}" alt="">
                    <p class="my-2 ml-1" style="font-size: 13px;">{{$offer->created_at->diffForHumans()}}</p>
                  </div>
                  
                  <div class="media">
                    <img class="my-2 ml-1" style="width: 13px;" src="{{asset('assets/xd/box.svg')}}" alt="">
                    <p class="my-2 ml-1" style="font-size: 13px;"> 
                      الإجمالي
                      <span class="text-primary">{{$offer->items->sum('total')}} ج.م</span>
                    </p>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-2 py-5 px-0">
                <a href="{{route('buyer.offers.show',$offer)}}" class="btn btn-sm rounded-lg text-primary my-6" style="background-color: #FFF4EC;" >التفاصيل</a>
              </div>
          
            </div>
            @endforeach
            @else
            لا يوجد أي عروض بعد
            @endif
          </div>
        </div>
        <div class="tab-pane fade px-4 pt-2" id="product" role="tabpanel" aria-labelledby="product-tab">
          <div class="row justify-content-between">
            @foreach($request->offers as $offer)
            <div class="col-md-6 row mb-4 " style="background-color: #FAFAFA;">
              <div class="col-md-3 px-0">
                <img class="my-6" src="{{asset('storage/'.$offer->supplier->company_logo)}}" style="width: 130px;" alt="">
              </div>
              <div class="col-md-7 py-5">
                <h6 class="font-weight-bold mb-5">{{$offer->supplier->company_name}}</h6>
                <p class="mb-5" style="font-size: 13px;">{{$offer->supplier->about}}</p>
                <p class="mb-5" style="font-size: 13px;">
                  <img src="{{asset('assets/xd/location.svg')}}" style="width: 12px;" alt="">
                  {{$offer->supplier->company_address}}
                </p>
                <div class="d-flex justify-content-between">
                  <div class="media">
                    <img class="my-2 ml-1" style="width: 13px;" src="{{asset('assets/xd/clock.svg')}}" alt="">
                    <p class="my-2 ml-1" style="font-size: 13px;">{{$offer->created_at->diffForHumans()}}</p>
                  </div>
                  
                  <div class="media">
                    <img class="my-2 ml-1" style="width: 13px;" src="{{asset('assets/xd/box.svg')}}" alt="">
                    <p class="my-2 ml-1" style="font-size: 13px;"> 
                      الإجمالي
                      <span class="text-primary">{{$offer->items->sum('total')}} ج.م</span>
                    </p>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-2 py-5 px-0">
                <a href="{{route('buyer.offers.show',$offer)}}" class="btn btn-sm rounded-lg text-primary my-6" style="background-color: #FFF4EC;" >التفاصيل</a>
              </div>
          
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
                
  </div>
</div>
@endsection

@section('scripts')

<script>
    $('#side-btn').on('click',function(){
      event.stopPropagation();
      $('#sidebare').toggleClass('sidebare-active');
    })

  window.addEventListener('click', function(e){   
    if (!document.getElementById('sidebare').contains(e.target)){
      $('#sidebare').removeClass('sidebare-active');
    }
  });
  
  </script>

@endsection