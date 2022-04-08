@extends('layouts.dashboard')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function (){
            $('.select2').select2();
            $('#companyImgUpload').on('change', function() {
                readURL(this, '#companyImg');
            });
            $('#teamImgUpload').on('change', function() {
                readURL(this, '#teamImg');
            });
            $('#qualityImgsUpload').on('change', function() {
                imagesPreview(this, '#qualityImgs');
            });
        })
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
@section('content')

<div class="row" id="content">
  <div class="col-12 justify-content-between text-right" style="font-size:30px;">
    تعديل بائع <span class="text-primary">{{$supplier->user->name}}</span>
  </div>


  <div class="mt-6 card mx-4 px-5 w-100">
    <ul class="nav nav-tabs px-0 font-weight-bold" id="myTab" role="tablist" style="height: 60px;">
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
          العروض
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
          طلبات الإتصال
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="height: 100%;line-height: 30px;" class="nav-link" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">
          التقييمات
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="border-right:0px !important;color: #6F6F6F !important;background: none !important;height: 100%;line-height: 30px;" class="nav-link" id="factories-tab" data-toggle="tab" href="#factories" role="tab" aria-controls="factories" aria-selected="false">
          الإعدادات
        </a>
      </li>
      <li class="nav-item" style="border-left:1px solid #f1f2f3 !important;">
        <a  style="border-right:0px !important;color: #6F6F6F !important;background: none !important;height: 100%;line-height: 30px;" class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
        الملف الشخصي
        </a>
      </li>
    </ul>
    <div class="tab-content pt-3 mb-6 text-right" id="myTabContent">
      @include('dashboard.suppliers.requests')
      @include('dashboard.suppliers.calls')
      @include('dashboard.suppliers.reviews')
      @include('dashboard.suppliers.settings')
      @include('dashboard.suppliers.profile')
    </div>
  </div>
</div>
@endsection
