@extends('buyer.index')
@section('dash-content')

<div class="text-right">
  <h6 class="d-flex lead-1 rounded-top py-3 mb-0 px-6 font-weight-bold text-primary shadow-lg" style="background-color: white; width: 150px;">
      عن الشركة
  </h6>
  <div class="bg-white">
    <div class="pt-6 p-4">
      <form action="{{route('buyer.settings')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">إسم الشركة:</label>
            <input type="text" name="company_name" value="{{$buyer->company_name}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3">شعار الشركة:</label>
            <div class="d-flex">
              <div>
                <img style="width: 50px;height:50px;" src="{{asset($buyer->company_logo)}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto"> 
                  <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="company_logo">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">إسم الشركة:</label>
            <select type="text" name="company_type" id="name" placeholder="" class="form-control rounded-lg">
              <option value="تاجر" {{$buyer->company_type == 'trader'?'selected':''}}>تاجر</option>
              <option value="مستهلك نهائي" {{$buyer->company_type == 'consumer'?'selected':''}}>مستهلك نهائي</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      </form>
    </div>
  </div>
</div>
@endsection