@extends('supplier.index')
@section('dash-content')

<div class="d-flex text-right">
  <a href="{{route('supplier.requests.index')}}" class="rounded-top py-3 px-6 font-weight-bold  text-primary ml-3" style="background-color:white;height: 45px;">
    المستقبلة
    <span class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:xx-small;height: 12px;width:12px;">3</span>
  
  </a>
  <a href="{{route('supplier.offers.index')}}" class="d-flex lead-1 rounded-top py-3 px-6 font-weight-bold text-default " style="background-color:  gainsboro;width: 110px;">
    المرسلة
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
      @if(count($request->files)>0)
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
      @endif
    </div>
    <form action="{{route('supplier.offers.store')}}" method="post" enctype="mulipart\data-form">
    <div class="m-3" style="background-color: #FAFAFA;">
      <div class="p-2 border rounded-lg mx-auto" style="display: table;" id="tbl">
        <div id="tbl-header" style="height: 50px;display: table-header-group;width: auto;clear: both;">
          <div style="display: table-cell;width: 160px;float: right;" class="p-3">المنتج</div>
          <div style="display: table-cell;width: 160px;float: right;" class="p-3"> العدد المطلوب</div>
          <div style="display: table-cell;width: 160px;float: right;" class="p-3">السعر لكل</div>
          <div style="display: table-cell;width: 160px;float: right;" class="p-3">سعر الوحدة</div>
          <div style="display: table-cell;width: 160px;float: right;" class="p-3">السعر الكلي</div>
          <div style="display: table-cell;width: 50px;float: right;"></div>
        </div>
        <hr style="margin: 0px;margin-bottom: 10px;">
        <div id="tbl-container">
          <div style="display: table-row;width: auto;clear: both;" class="sm-tbl-row mb-3">
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">المنتج</div>
              <input name="offerItems[0][product_name]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header"> العدد المطلوب</div>
              <input name="offerItems[0][amount]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">

            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر لكل</div>
              <input name="offerItems[0][unit]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">سعر الوحدة</div>
              <input name="offerItems[0][unit_price]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر الكلي</div>
              <input name="offerItems[0][total]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: table-cell;height: 50px;width: 135px;float: right;display: none;" class="sm-tbl-cell-header"></div>
              <div class="sm-tbl-cell-header" style="max-width: 150px;">
                <img src="{{asset('assets/xd/bin.svg')}}" style="width: 50px;" class="mx-auto remove" alt="">
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <p class="text-primary font-weight-bold" id="addRow">
          <span class="fa fa-plus-circle text-primary p-2" ></span>
            إضافة   
        </p>
    </div>


      @csrf
      <input type="hidden" name="request_id" value="{{$request->id}}" id="">
      <input type="hidden" name="buyer_id" value="{{$request->buyer->id}}" id="">
      <input type="hidden" name="supplier_id" value="{{auth()->user()->userable->id}}" id="">
    <div class="p-5">
      <h6 class="">
        طرق الدفع:
      </h6>
      <div class="d-flex mt-5">
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="payment_way" value="كاش" id="" class="ml-3">
          كاش
        </div>
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="payment_way" value="آجل" id="" class="ml-3">
          اجل
        </div>
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="payment_way" value="كاش أو آجل" id="" class="ml-3" checked>
          كاش أو أجل
        </div>
      </div>
    </div>
    <div class="p-5">
      <h6 class="">
        يوجد توصيل:
      </h6>
      <div class="d-flex mt-5">
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="delivery" value="1" id="" class="ml-3" checked>
          نعم
        </div>
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="delivery" value="0" id="" class="ml-3">
          لا
        </div>
      </div>
    </div>
    <div class="p-5" >
      <h6 class="mb-5 text-default">
        التوصيل داخل محافظة:
      </h6>
      <input type="text" name="state" id="" class="form-control rounded-lg" required>

    </div>
    <div class="p-5">
      <h6 style="display: inline-block;">الطبية ستكون جاهزة للتوصيل خلال</h6>
      <input type="number" name="ready-after" id="" style="width: 70px;height: 50px;" class="rounded border mx-3" required>
      يوم
    </div>
    <div class="p-5">
      <h6 style="display: inline-block;"> عرض ساري لمدة </h6>
      <input type="number" name="available-for" id="" style="width: 70px;height: 50px;" class="rounded border mx-3" required>
      يوم
    </div>
    
    <div class="p-5">
      <h6> ملاحظات: </h6>
      <textarea name="notes" id="" class="form-control mt-5 rounded-lg" rows="5" required></textarea>
      يوم
    </div>
    <div class="p-5">
      <h6 class="">
        هل توجد مرفقات:
      </h6>
      <div class="d-flex mt-5">
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="" id="" class="ml-3">
          نعم
        </div>
        <div class="media ml-6">
          <input type="radio" style="transform: scale(2);" name="" id="" class="ml-3">
          لا
        </div>
      </div>
    </div>
    <div class="p-5" style="clear: right;">
      <div class="d-flex">
        <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

          <div class="py-2 mx-autos"> 
            <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
          </div>
          <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
            <input type="file" name="files[]" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" multiple>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="m-5 btn btn-primary rounded px-6">إرسال</button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>

$(document).ready(function(){

    var count = 1    
    $('#addRow').on('click',function()
    {
      var html = `
          <div style="display: table-row;width: auto;clear: both;" class="sm-tbl-row mb-3">
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">المنتج</div>
              <input name="offerItems[${count}][product_name]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header"> العدد المطلوب</div>
              <input name="offerItems[${count}][amount]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">

            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر لكل</div>
              <input name="offerItems[${count}][unit]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">سعر الوحدة</div>
              <input name="offerItems[${count}][unit_price]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: none;min-width: 135px;" class="sm-tbl-cell-header">السعر الكلي</div>
              <input name="offerItems[${count}][total]" style="min-width: 135px;max-width:150px;" class="p-3 sm-tbl-cell-header border rounded-lg">
            </div>
            <div  style="display: table-cell;height: 50px;float: right;" class="sm-tbl-cell ml-3 mb-3">
              <div style="display: table-cell;height: 50px;width: 135px;float: right;display: none;" class="sm-tbl-cell-header"></div>
              <div class="sm-tbl-cell-header" style="max-width: 150px;">
                <img src="{{asset('assets/xd/bin.svg')}}" style="width: 50px;" class="mx-auto remove" alt="">
              </div>
            </div>
          </div>
      `;
      $('#tbl').append(html);
      count++;
      
    });
  
    $(document).on('click', '.remove', function(){
      $(this).parents().eq(2).remove();
    });


});
</script>

@endsection