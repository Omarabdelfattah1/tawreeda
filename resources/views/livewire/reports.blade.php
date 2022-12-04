<div class="pt-6 w-100">
    <div class="row">
        <div class="col-md-3 form-group">
            <label>رقم البلاغ</label>
            <input class="form-control" wire:model="report_id" type="number">
        </div>
        <div class="col-md-3 form-group">
            <label>رقم البلاغ</label>
            <input class="form-control" wire:model="report_id" type="number">
        </div>
    </div>
    <div id="tbl" class="text-dark p-2 w-100" style="display:table;border-collapse: collapse;">
        <div id="tbl-header" style="font-size: 14px;display:table-row;" class="text-primary font-weight-bold">
            <div  class="py-3" style="display:table-cell;padding:6px;">ID</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">صاحب البلاغ</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">سبب البلاغ  </div>
            <div  class="py-3" style="display:table-cell;padding:6px;">التاريخ</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">التعليق</div>
            <div  class="py-3" style="display:table-cell;padding:6px;">التعديل</div>
        </div>

        @foreach($reports as $report)
            <div style="display:table-row;font-size:12px;width: auto;clear: both;border-bottom: 4px solid #F4F4F4 !important;" class="sm-tbl-row bg-white">

                <div style="display:table-cell" class="sm-tbl-cell">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">ID</div>

                    <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                        {{$report->id}}
                    </div>
                </div>
                <div style="display:table-cell" class="sm-tbl-cell">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">صاحب البلاغ</div>

                    <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                        <div class="media">
                            <img src="{{asset($report->user->photo)}}" alt="" style="width: 30px;height: 30px;">
                            <div class="mr-2">
                                <a href="{{$report->user->userable instanceof \App\Models\Buyer ?route('dashboard.buyers.edit',$report->user->userable):route('dashboard.suppliers.edit',$report->user->userable)}}" class="font-weight-bold">{{$report->user->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:table-cell" class="sm-tbl-cell">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">سبب البلاغ</div>

                    <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                        <div class="media">
                            <div class="mr-2">
                                <p class="font-weight-bold">{{$report->type}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:table-cell;" class="sm-tbl-cell">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التاريخ</div>

                    <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$report->created_at->diffForHumans()}}</div>
                </div>
                <div style="display:table-cell;" class="sm-tbl-cell">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header"> التعليق </div>
                    <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">{{$report->comment}}</div>
                </div>
                <div style="display:table-cell;" class="sm-tbl-cell mr-auto">
                    <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header">التعديل</div>

                    <div class="py-3 sm-tbl-cell-header" style="padding:6px;"  >
                  <span class="ml-2">
                  <i class="fa fa-ban" alt="" ></i>
                    حظر
                  </span>
                        <form class="d-inline" action="{{route('dashboard.reports.destroy',$report)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-none p-0 border-0">
                                <i class="fa fa-trash text-danger" alt=""></i>
                                مسح
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
