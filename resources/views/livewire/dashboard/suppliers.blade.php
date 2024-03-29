<div>
    <div class="row text-right">
    <div class="col-sm-6">
    <h1  style="font-size:30px;">
    الموردين
    </h1>
    </div>
    <div class="col-sm-6">
    <input type="text" name="search"   class="form-control rounded-lg mr-auto" placeholder="بحث" style="width: 250px;" wire:model="search">

    </div>
    </div>
    <div class="pt-6 row mx-auto mb-6">
    {{--    <div class="col-lg-3 col-md-3 text-center">--}}
    {{--      <div class="card py-2 px-1 mx-auto my-3">--}}
    {{--        <img src="{{asset('assets/xd/add-supplier.svg')}}" style="width:130px" alt="" class="mx-auto d-block">--}}
    {{--        <div class="text-center mt-3">--}}
    {{--          <h5 class="font-weight-bold text-center" style="color: #1E3A56;">إضافة مورد جديد</h5>--}}

    {{--          <p class="mt-3 text-center" style="font-size: 12px;line-height: 20px;color: #B0CAD1;">--}}
    {{--            قم بإضافة مورد جديد حتى يتمكن من طلب و إستقبال عروض--}}
    {{--          </p>--}}
    {{--          <div class="my-5 text-center">--}}
    {{--            <a href="{{route('dashboard.suppliers.create')}}" class="btn btn-primary rounded-lg" style="font-size: 12px;letter-spacing: 0px;">--}}
    {{--              إضافة--}}
    {{--            </a>--}}
    {{--          </div>--}}
    {{--        </div>--}}
    {{--      </div>--}}

    {{--    </div>--}}
    @foreach($suppliers as $supplier)
    <div class="col-lg-3 col-md-3">
    <div class="card py-2 px-1 mx-auto my-3">
      <a href="{{route('dashboard.suppliers.edit',$supplier)}}">
        <img src="{{asset($supplier->company_logo)}}" style="width:130px;height:130px;" alt="" class="mx-auto d-block">
      </a>
      <div class="text-center mt-3">
        <h5 class="font-weight-bold text-center" style="color: #1E3A56;">{{$supplier->company_name}}</h5>
        <p class="mt-3 text-center text-primary" style="font-size: 12px;">
          {{$supplier->user->name}}
        </p>
        <p class="mt-3 text-center" style="font-size: 12px;">{{$supplier->user->summary}}</p>
        <div class="my-5 text-center">
          <form class="d-inline" onsubmit="return confirm('هل فعلاً تريد حذف هذا المورد؟');" action="{{route('dashboard.suppliers.destroy',$supplier)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-none p-0" style="color: #F46363;font-size: 12px;letter-spacing: 0px;">
              <i class="fa fa-trash"></i>
              حذف
            </button>
          </form>
          <a href="{{route('dashboard.suppliers.edit',$supplier)}}" class="btn btn-none" style="color: #2196F3;font-size: 12px;letter-spacing: 0px;">
            <i class="fa fa-edit"></i>
            تعديل
          </a>
        </div>
      </div>
    </div>
    </div>
    @endforeach
    </div>
    <div class="align-content-center">
        {{$suppliers->links('vendor.livewire.bootstrap')}}

    </div>
</div>
