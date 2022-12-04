@extends('supplier.index')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $('select').select2();
  $('#imgUpload1').on('change', function() {
      readURL(this, '#imgShow1');
  });
  $('#imgUpload2').on('change', function() {
      readURL(this, '#imgShow2');
  });
</script>
@endsection
@section('dash-content')

<div class="text-right">
  <div class="d-flex">
    <a href="{{route('supplier.settings')}}" class="rounded-top py-3 px-6 font-weight-bold  text-primary" style="background-color:white;">
      عن الشركة
    </a>
    <a href="{{route('supplier.products')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-default " style="background-color:  gainsboro;">
      المنتجات
    </a>
    <a href="{{route('supplier.factories')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-default " style="background-color:  gainsboro;">
      المصانع | المخازن
    </a>
  </div>
  <div class="bg-white">
    <div class="pt-6 p-4">
      <form action="{{route('supplier.settings')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">إسم الشركة:</label>
            <input type="text" name="company_name" value="{{$supplier->company_name}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3">شعار الشركة:</label>
            <div class="d-flex">
              <div>
                <img id="imgShow1" style="width: 50px;height:50px;" src="{{asset($supplier->company_logo)}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input id="imgUpload1" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="company_logo">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="type"> القسم</label>
            <select id="dept" type="text" name="departments[]" placeholder="" class="select form-control rounded-lg" multiple>
              @foreach($departments as $d)
              <option value="{{$d->id}}" {{$supplier->departments->contains($d->id)?'selected':''}}>{{$d->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="type"> الفئة</label>
            <select id="category" type="text" name="categories[]" placeholder="" class="select form-control rounded-lg" multiple>
              @foreach($categories as $c)
              <option value="{{$c->id}}" {{$supplier->categories->contains($c->id)?'selected':''}}>{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
            <select name="state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary">
              @foreach(config('states') as $state)
              <option value="{{$state}}" {{$supplier->state == $state ?'selected':''}}>{{$state}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="address"> عنوان الشركة</label>
            <input type="text" name="company_address" value="{{$supplier->company_address}}" id="address" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="number">  أرقام التواصل</label>
            <input type="text" name="phones" value="{{$supplier->phones}}" id="number" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="email">  البريد الإلكتروني</label>
            <input type="text" name="email" value="{{$supplier->email}}" id="email" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="tax-card">   البطاقة الضريبية</label>
            <input type="text" name="company_TXCard" value="{{$supplier->company_TXCard}}" id="tax-card" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="trad-number">    رقم السجل التجاري</label>
            <input type="text" name="company_CRN" value="{{$supplier->company_CRN}}" id="trad-number" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-12">
            <label class="mb-3" for="summary">   نبذة عن الشركة</label>
            <textarea type="text" name="about" id="summary" placeholder="" class="form-control rounded-lg" rows="3">{{$supplier->about}}</textarea>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="emp-number"> عدد موظفين الشركة</label>
            <input type="number" name="employees_number" value="{{$supplier->employees_number}}" id="emp-number" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صورة فريق العمل:</label>
            <div class="d-flex imgPreviewBox">
              <div>
                <img id="imgShow2" style="width: 50px;height:50px;" src="{{asset($supplier->team_photo)}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input id="imgUpload2" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInput" name="team_photo">
                </div>
              </div>
            </div>
          </div>
            <div class="form-group col-md-6" style="clear: right;">
                <label class="mb-3"> الكتالوج:</label>
                <div class="d-flex" style="max-width: 300px;">
                    <a href="{{asset($supplier->company_cataloge)}}" target="_blank">
                        <img class="prevCataloge" style="width: 50px;height:50px;" src="{{asset($supplier->company_cataloge)}}" alt="">
                    </a>
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                        <div class="p-1">
                            <img  style="width: 40px;height:40px;" src="/assets/xd/icons/file.png" alt="">
                        </div>
                        <div class="p-1">
                            <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;height: 40px;"> إستعراض الملفات
                                <input data-imgid="#prevCataloge" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="company_cataloge">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="mb-3" for="instagram">إنستغرام</label>
                <input type="url" name="instagram" value="{{$supplier->instagram}}" id="instagram" placeholder="" class="form-control rounded-lg">
            </div>
            <div class="form-group col-md-6">
                <label class="mb-3" for="facebook">فيسبوك</label>
                <input type="url" name="facebook" value="{{$supplier->facebook}}" id="facebook" placeholder="" class="form-control rounded-lg">
            </div>
          <div class="form-group col-12">
            <label class="mb-3" for="team_description">   وصف فريق العمل</label>
            <textarea type="text" name="team_description" id="team_description" placeholder="" class="form-control rounded-lg" rows="3">{{$supplier->team_description}}</textarea>

          </div>
        </div>
        <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      </form>
    </div>
  </div>
</div>
@endsection
