@extends('layouts.dashboard')
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
<script>
  $('form').submit(function( event ) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data: formData, // Remember that you need to have your csrf token included
        dataType: 'json',
        success: function( _response ){
            alert('تم تحديث البيانات بنجاح');
        },
        error: function( _response ){
            alert('الرجاء إختيار بيانات صالحة');
        }
    });
});
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
    تعديل مشتري <span class="text-primary">{{$supplier->user->name}}</span>
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
