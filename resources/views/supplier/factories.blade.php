@extends('supplier.index')
@section('dash-content')

<div class="text-right">
  <div class="d-flex">
    <a href="{{route('supplier.settings')}}" class="rounded-top py-3 px-6 font-weight-bold  text-default" style="background-color:gainsboro;">
      عن الشركة

    </a>
    <a href="{{route('supplier.products')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-default " style="background-color:  gainsboro;">
      المنتجات
    </a>
    <a href="{{route('supplier.factories')}}" class="mr-1 rounded-top py-3 px-6 font-weight-bold text-primary " style="background-color:  white;">
      المصانع | المخازن
    </a>
  </div>
  <div class="bg-white">
    <div class="pt-6 p-4">
      <form action="{{route('supplier.factories')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
          <div class="form-group col-12">
            <label class="mb-3" for="name">الجودة و مطابقة المواصفات:</label>
            <textarea type="text" name="quality"  id="name" placeholder="" class="form-control rounded-lg">{{$supplier->quality}}</textarea>
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صور الجودة و مطابقة المواصفات:</label>
            <div class="d-flex">
              <div>
                @foreach($supplier->quality_files() as $file)
                <div style="position:relative;display:inline-block" id="img{{$file->id}}">
                  <img class="rounded-circle"  style="width: 50px;height:50px;" src="{{asset('storage/'.$file->path)}}" alt="">
                  <span onclick="delete_img({{$file->id}})" class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:small;height: 15px;width:15px;position:absolute;top:0;left:0;cursor:pointer;">x</span>

                </div>
                @endforeach
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="quality_files[]" multiple>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-12">
            <label class="mb-3" for="name">خطوط الإنتاج:</label>
            <textarea type="text" name="production"  id="name" placeholder="" class="form-control rounded-lg">{{$supplier->production}}</textarea>
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صور خطوط الإنتاج:</label>
            <div class="d-flex">
              <div>
                @foreach($supplier->production_files() as $file)
                  <div style="position:relative;display:inline-block" id="img{{$file->id}}">
                    <img class="rounded-circle"  style="width: 50px;height:50px;" src="{{asset('storage/'.$file->path)}}" alt="">
                    <span onclick="delete_img({{$file->id}})" class="rounded-circle d-inline-block text-center" style="background-color: #ff2156;color: white;font-size:small;height: 15px;width:15px;position:absolute;top:0;left:0;cursor:pointer;">x</span>

                  </div>
                @endforeach
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="production_files[]" multiple>
                </div>
              </div>
            </div>
          </div>
        </div>
          <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  function delete_img(id){
    $('#img'+id).remove();

    $.post("{{route('file.delete')}}",
    {
      id : id,
      _token : "{{csrf_token()}}"
    },function(data,status){
    });
  }
</script>
@endsection
