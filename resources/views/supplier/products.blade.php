@extends('supplier.index')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
  $('.select').selectpicker({
    noneSelectedText:''
  });
</script>
@endsection
@section('dash-content')

<div class="text-right">
  <div class="d-flex">
    <a href="{{route('supplier.settings')}}" class="rounded-top py-3 px-6 font-weight-bold  text-default" style="background-color:gainsboro;height: 45px;">
      عن الشركة
     
    </a>
    <a href="{{route('supplier.products')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-primary " style="background-color:  white;">
      المنتجات
    </a>
    <a href="{{route('supplier.factories')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-default " style="background-color:  gainsboro;">
      المصانع | المخازن
    </a>
  </div>
  <div class="bg-white">
    <div class="pt-6 p-4">
      <div class="row">
        <div class="form-group col-12">
          <label class="mb-3" for="name">لمنتجات:</label>
          <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary rounded">إضافة منتج</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel">إضافة منتج</h5>
                </div>
                <form class="modal-body" action="{{route('supplier.products.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-4">إسم المنتج</label>
                    <input name="name" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group col-md-6" style="clear: right;">
                    <label class="mb-3">قم بإضافة صورة</label>
                    <div class="d-flex">
                      <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                        <div class="py-2 mx-auto"> 
                          <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                          <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="img">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary rounded-lg">إضافة</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($supplier->products as $p)
        <div class="col-lg-4 col-md-6 col-12">
          <div class="mx-2 my-3 rounded-lg border border-secondary media">
            <img class="p-3" width="100px" src="{{asset('storage/'.$p->img)}}" alt="">
            <div class="my-6 pr-3">{{$p->name}}</div>
          </div>
          
        </div>
        @endforeach
      </div>
      <form action="{{route('supplier.products')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

          <div class="row">
            <div class="form-group col-12">
              <label class="mb-3" for="name">تصنيفات المنتج:</label>
              <select type="text" name="tagproduct[]" value="{{$supplier->company_name}}" id="name" placeholder="" class="select form-control rounded-lg" multiple>
                @foreach($tagproducts as $tag)
                <option value="{{$tag->id}}" {{$supplier->tagproducts->contains($tag->id)?'selected':''}}>{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          

          <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      </form>
      
    </div>
  </div>
</div>
@endsection