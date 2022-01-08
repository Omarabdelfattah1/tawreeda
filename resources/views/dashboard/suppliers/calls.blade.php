<div class="tab-pane  fade" id="product" role="tabpanel" aria-labelledby="product-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div id="tbl" class="text-dark border rounded-lg p-2" style="margin: 0px;display:table;width:100%;">
          <div id="tbl-header" style="font-size: 14px;display:table-row;">
            <div  class="py-3" style="display:table-cell;padding:6px;">التاريخ</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">التوقيت المناسب </div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الشركة</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الوظيفة</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">نوع الإتصال</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">الحالة</div>
          </div>
          @foreach($supplier->calls as $call)
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
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">العميل</div>
            
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
              <div class="media">
                <img src="{{asset($call->buyer->company_logo)}}" alt="" style="width: 30px;">
                <div class="mr-2">
                  <h6 class="font-weight-bold mb-2">{{$call->buyer->company_name}}</h6>
                  <p>{{$call->buyer->about}}</p>
                </div>
              </div>
            </div>
          </div>
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">النوع</div>
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->buyer->company_type}}</div>
          </div>
          <div style="display:table-cell;" class="sm-tbl-cell">
            <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">الوظيفة</div>
            <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$call->buyer->user->summary}}</div>
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
        </div>
      </div>