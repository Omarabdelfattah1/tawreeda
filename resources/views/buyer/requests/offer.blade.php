@extends('buyer.index')
@section('dash-content')
<div class="d-flex ">
  <a href="{{route('buyer.requests.index')}}" class="rounded-top py-3 px-6 font-weight-bold  text-primary ml-3" style="background-color:white;height: 45px;">
    المستقبلة
    <span class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:xx-small;height: 12px;width:12px;">3</span>
  
  </a>
</div>
<div class="bg-white">
  <div class="pt-3">
    <div class="row flex-warp m-3 border-bottom" >
      <div class="col-md-9 media">
        <img class="m-3" style="width: 70px;" src="{{asset('storage/'.$offer->request->buyer->company_logo)}}" alt="">
        <div class="">
          <h6 class="py-3 font-weight-bold">
            {{$offer->request->buyer->company_name}}
          
          </h6>
          <div class="row mr-1  mt-3">
            <div class="media ml-3 mb-3">
              <img style="width: 20px;" class="ml-2" src="{{asset('assets/xd/icons/recevied.png')}}" alt="">
              <div>
                <h6 style="font-size: 12px;" class="font-weight-bold mb-1">{{$offer->request->buyer->user->name}}</h6>
                <p style="font-size: 10px;" >{{$offer->request->buyer->user->summary}}</p>
              </div>
            </div>
            <div class="media">
              <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/phone.svg')}}" alt="">
              <h6 style="font-size: 12px;" class="ml-2">{{$offer->request->buyer->user->mobile}}</h6>
              <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/whatstapp.svg')}}" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="p-2 col-md-3 text-left">
        <div class="media mb-6">
          <img class="ml-2" style="width: 20px;" src="{{asset('assets/xd/clock.png')}}" alt="">
          <h6 style="font-size: 12px;" class="font-weight-bold">{{$offer->request->created_at->diffForHumans()}}</h6>
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
          {{$offer->request->description}}
        </p>
      </div>
      <div class="col-md-5 " style="background-color: #FAFAFA">
        <h6 >المرفقات:</h6>
        @foreach($offer->request->files as $file)
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
    </div>
    <div class="m-3" style="background-color: #FAFAFA;">
      <div class="p-2 border rounded-lg mx-auto" style="display: table;" id="tbl">
        <div id="tbl-header" style="height: 50px;display: table-header-group;width: auto;clear: both;">
          <div style="display: table-cell;width: 150px;float: right;" class="p-3">المنتج</div>
          <div style="display: table-cell;width: 150px;float: right;" class="p-3"> العدد المطلوب</div>
          <div style="display: table-cell;width: 150px;float: right;" class="p-3">السعر لكل</div>
          <div style="display: table-cell;width: 150px;float: right;" class="p-3">سعر الوحدة</div>
          <div style="display: table-cell;width: 150px;float: right;" class="p-3">السعر الكلي</div>
        </div>
        <hr style="margin: 0px;margin-bottom: 10px;">
        @foreach($offer->items as $item)
        <div style="display: table-row;width: auto;clear: both;" class="sm-tbl-row mb-3">
          <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
            <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">المنتج</div>
            <div style="min-width: 135px;" class="p-3 sm-tbl-cell-header">{{$item->product_name}}</div>
          </div>
          <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
            <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header"> العدد المطلوب</div>
            <div style="min-width: 135px;" class="p-3 sm-tbl-cell-header">{{$item->amount}}</div>

          </div>
          <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
            <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر لكل</div>
            <div style="min-width: 135px;" class="p-3 sm-tbl-cell-header">{{$item->unit}}</div>
          </div>
          <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
            <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">سعر الوحدة</div>
            <div style="min-width: 135px;" class="p-3 sm-tbl-cell-header">{{$item->unit_price}}</div>
          </div>
          <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
            <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر الكلي</div>
            <div style="min-width: 135px;" class="p-3 sm-tbl-cell-header">{{$item->total}}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="p-3 d-flex" >
        <img src="{{asset('assets/xd/valid.svg')}}" alt="" style="width: 30px;">
        <h6 class="mx-2 d-inline-block" style="font-size: 18px;line-height: 30px;">طرق الدفع:</h6>
        <p  style="line-height: 30px;">  {{$offer->payment_way}} </p>
    </div>
    <div class="p-3 d-flex" >
        <img src="{{asset('assets/xd/valid.svg')}}" alt="" style="width: 30px;">
        <p  style="line-height: 30px;" class="mr-2">  يوجد توصيل داخل محافظة <span class="font-weight-bold">{{$offer->state}}</span></p>
    </div>
    <div class="p-3 d-flex" >
        <img src="{{asset('assets/xd/valid.svg')}}" alt="" style="width: 30px;">
        <p  style="line-height: 30px;" class="mr-2">  الطلبية ستكون جاهزة خلال  <span class="font-weight-bold">{{$offer->ready_after}}</span> يوم</p>

    </div>
    <div class="p-3 d-flex" >
        <img src="{{asset('assets/xd/valid.svg')}}" alt="" style="width: 30px;">
        <p  style="line-height: 30px;" class="mr-2">  عرض السعر ساري لمدة  <span class="font-weight-bold">{{$offer->available_for}}</span> يوم من إرساله</p>

    </div>
    
    <div class="row m-3 justify-content-between border-bottom pb-3">
      <div class="col-md-6">
        <h6 class="mb-6">ملاحظات:</h6>
        <p style="line-height: 20px;">
          {{$offer->notes}}
        </p>
      </div>
      <div class="col-md-5 " style="background-color: #FAFAFA">
        <h6 >المرفقات:</h6>
        @foreach($offer->files as $file)
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
  </div>
</div>

@endsection