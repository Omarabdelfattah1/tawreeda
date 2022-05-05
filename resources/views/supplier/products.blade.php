@extends('supplier.index')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    $('.select2').select2();

  function editProduct(id,route,product_name){
      var product_img = $(id + ' img').attr('src');
      $('#editProduct form').attr('action',route);
      $('#editProduct form #name').val(product_name);
      $('#editProduct form img').attr('src',product_img);
      $('#editProduct').modal('show');
  }
</script>
@endsection
@section('dash-content')

<div class="text-right">
  <div class="d-flex">
    <a href="{{route('supplier.settings')}}" class="rounded-top py-3 px-6 font-weight-bold  text-default" style="background-color:gainsboro;">
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
                    <div class="form-group" style="clear: right;">
                        <label class="mb-3">قم بإضافة صورة</label>
                        <div class="d-flex">
                            <div class="px-3 py-1 mr-3  d-flex border border-primary-dotted rounded-lg">

                                <div class="py-2 mx-2">
                                    <img id="productId" style="width: 25px;" src="/assets/xd/icons/file.png" alt="">
                                </div>
                                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;">
                                    <span>إستعراض الملفات</span>
                                    <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" data-imgid="#productId" class="ml-2 m-0 imgPreviewInputFinal" name="img">
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
          <div class="col-lg-4 col-md-6 col-12" id="product{{$p->id}}" data-id="{{$p->id}}">

              <div class="mx-2 my-3 rounded-lg border border-secondary media">
                  <img class="p-3" width="100px" src="{{asset('storage/'.$p->img)}}" alt="">
                  <div class="my-6 pr-3">
                      {{$p->name}}
                      <div>
                          <span onclick="editProduct('#product'+{{$p->id}},'{{route('supplier.edit_product',$p->id)}}','{{$p->name}}')"><i class="fa fa-edit"></i></span>
                          <span onclick="productDelete{{$p->id}}.submit(confirm('هل تريد مسح هذا المنتج؟'))"><i class="fa fa-trash text-danger"></i></span>
                      </div>
                      <form method="post" class="d-none" action="{{route('supplier.delete_product',$p->id)}}" name="productDelete{{$p->id}}">
                          @csrf
                      </form>
                  </div>
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
              <select type="text" name="tagproduct[]" value="{{$supplier->company_name}}" id="name" placeholder="" class="select2 form-control rounded-lg" multiple>
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
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="editProductLabel">إضافة منتج</h5>
            </div>
            <form class="modal-body text-right" action="_" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>إسم المنتج</label>
                    <input name="name" type="text" class="form-control rounded-lg" id="name">
                </div>
                <div class="form-group" style="clear: right;">
                    <label class="mb-3">قم بإضافة صورة</label>
                    <div class="d-flex">
                        <div class="px-3 py-1 mr-3  d-flex  w-80 border border-primary-dotted rounded-lg">

                            <div class="py-2 mx-2 w-30">
                                <img id="productId" src="../assets/xd/icons/file.png" alt="">
                            </div>
                            <div class="btn btn-sm rounded btn-primary w-70" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" data-imgid="#productId" class="ml-2 m-0 imgPreviewInputFinal" name="img">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary rounded-lg">إضافة</button>
            </form>
        </div>
    </div>
</div>

@endsection
