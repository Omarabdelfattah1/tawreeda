@extends('buyer.index')
@section('dash-content')

<div class="text-right col-12">
  <div class="d-flex">
    <h6 class="rounded-top mb-0 py-3 px-4 font-weight-bold text-primary" style="background-color: white; width: 150px;">
      طلبات الإتصال
    </h6>
  </div>
  <div class="bg-white mb-6 pt-6 p-3 mx-1">
      <div id="tbl" class="text-dark border rounded-lg p-2" style="margin: 0px;display:table;width:100%;">
        <div id="tbl-header" style="font-size: 14px;display:table-row;">
          <div  class="py-3" style="display:table-cell;padding:6px;">التاريخ</div>
          <div  class="py-3" style="display:table-cell;padding:6px;">التوقيت المناسب </div>
          <div  class="py-3" style="display:table-cell;padding:6px;">الشركة</div>
          <div  class="py-3" style="display:table-cell;padding:6px;">الوظيفة</div>
          <div  class="py-3" style="display:table-cell;padding:6px;">نوع الإتصال</div>
          <div  class="py-3" style="display:table-cell;padding:6px;">الحالة</div>
        </div>
        @if(count(auth()->user()->userable->calls))
        @foreach(auth()->user()->userable->calls as $call)
        <div style="display:table-row;font-size:12px;width: auto;clear: both;" class="sm-tbl-row mb-3">
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التاريخ</div>
            
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->date}}</div>
          </div>
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التوقيت المناسب </div>
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->from_time}} , {{$call->to_time}}</div>
          </div>
          <div style="display:table-cell" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الشركة</div>
            
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
              <div class="media">
                <img src="{{asset($call->supplier->company_logo)}}" alt="" style="width: 30px;">
                <div class="mr-2">
                  <h6 class="font-weight-bold mb-2">{{$call->supplier->company_name}}</h6>
                  <p>{{$call->supplier->about}}</p>
                </div>
              </div>
            </div>
          </div>
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الوظيفة</div>
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">أكواب ورقية و بلاستيكية</div>
          </div>
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">نوع الإتصال</div>
            
            <div class="d-flex py-3 sm-tbl-cell-header" style="padding:6px;"  >
              <img src="{{asset('assets/xd/phone.svg')}}" alt="" style="width: 25px; margin: auto;">
              <img src="{{asset('assets/xd/mail.svg')}}" alt="" style="width: 25px;">
            </div>
          </div>
          <div style="display:table-cell" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الحالة</div>
            
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
              <button class="btn btn-xs btn-success rounded-lg">تم الإتصال</button>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div>
          لا يوجد طلبات إتصال
        </div>
        @endif
      </div>
  </div>
</div>
@endsection