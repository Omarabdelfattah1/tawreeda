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
      <div class="col-md-6">
        <div class="form-group">
          <label class="mb-3" for="name">إسم الشركة:</label>
          <input type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group" style="clear: right;">
          <label class="mb-3">شعار الشركة:</label>
          <div class="d-flex">
            <div >
              <i class="fa fa-image" style="font-size: 50px;"></i>
            </div>
            <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

              <div class="py-2 mx-auto"> 
                <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
              </div>
              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="optradio">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="mb-3" for="type"> القسم</label>
          <select type="text" name="" id="type" placeholder="" class="form-control rounded-lg">
            <option value="">مستلزمات مطاعم و كافيهات</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mb-3" for="type"> الفئة</label>
          <select type="text" name="" id="type" placeholder="" class="form-control rounded-lg">
            <option value="">تعبئة و تغليف</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mb-3" for="type"> المحافظة</label>
          <select type="text" name="" id="type" placeholder="" class="form-control rounded-lg">
            <option value="">الجيزة</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mb-3" for="address"> عنوان الشركة</label>
          <input type="text" name="" id="address" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="number">  أرقام التواصل</label>
          <input type="text" name="" id="number" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="email">  البريد الإلكتروني</label>
          <input type="text" name="" id="email" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="tax-card">   البطاقة الضريبية</label>
          <input type="text" name="" id="tax-card" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="trad-number">    رقم السجل التجاري</label>
          <input type="text" name="" id="trad-number" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="trad-number">    أهم المنتجات</label>
          <input type="text" name="" id="trad-number" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="trad-number">    أهم العملاء (كصناعة)</label>
          <input type="text" name="" id="trad-number" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group col-12">
          <label class="mb-3" for="summary">   نبذة عن الشركة</label>
          <textarea type="text" name="" id="summary" placeholder="" class="form-control rounded-lg" rows="3"></textarea>
            
        </div>
        <div class="form-group">
          <label class="mb-3" for="emp-number"> عدد موظفين الشركة</label>
          <input type="text" name="" id="emp-number" placeholder="" class="form-control rounded-lg">
            
        </div>
        <div class="form-group" style="clear: right;">
          <label class="mb-3"> صورة فريق العمل:</label>
          <div class="d-flex">
            <div>
              <i class="fa fa-image" style="font-size: 50px;"></i>
              
            </div>
            <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

              <div class="py-2 mx-auto"> 
                <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
              </div>
              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="optradio">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group col-12">
          <label class="mb-3" for="work-team-description">   وصف فريق العمل</label>
          <textarea type="text" name="" id="work-team-description" placeholder="" class="form-control rounded-lg" rows="3"></textarea>
            
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="mb-3" for="name">إسم المستخدم:</label>
          <input type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group">
          <label class="mb-3" for="name"> رقم الموبيل:</label>
          <input type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group">
          <label class="mb-3" for="name">  عنوان البريد الإلكتروني:</label>
          <input type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group">
          <label class="mb-3" for="name">  اللقب:</label>
          <select type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
            <option value="">مهندس</option>
          </select>
        </div>
        <div class="form-group">
          <label class="mb-3" for="name">  نبذة عن صفة المستخدم:</label>
          <input type="text" name="" id="name" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group" style="clear: right;">
          <label class="mb-3"> صورة المستخدم:</label>
          <div class="d-flex">
            <div>
              <i style="font-size: 50px;" class="fa fa-image" alt=""></i>
            </div>
            <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

              <div class="py-2 mx-auto"> 
                <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
              </div>
              <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="optradio">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="mb-3" for="password"> كلمة المرور :</label>
          <input type="password" name="" id="password" placeholder="" class="form-control rounded-lg">
        </div>
        <div class="form-group">
          <label class="mb-3" for="password-confirm"> تأكيد كلمة المرور :</label>
          <input type="password-confirm" name="" id="password-confirm" placeholder="" class="form-control rounded-lg">
        </div>
        <button class="btn btn-primary btn-sm rounded px-6">حفظ</button>
      </div>
    </div>
  
  </div>
</div>
@endsection
