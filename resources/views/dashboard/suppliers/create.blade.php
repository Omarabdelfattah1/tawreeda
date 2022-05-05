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
    إضافة مورد
  </div>


  <div class="mt-6 card mx-4 px-5 pt-3 w-100">
    <div class="row">
      @include('')
    </div>

  </div>
</div>
@endsection
