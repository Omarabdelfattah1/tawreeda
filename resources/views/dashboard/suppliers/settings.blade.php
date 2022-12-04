<div class="tab-pane  fade" id="factories" role="tabpanel" aria-labelledby="factories-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
  <div class="bg-white">
    <div class="pt-6 p-4">
      <form id="editSupplier" action="{{route('dashboard.suppliers.update',$supplier)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="settings" value="settings" id="">
        <div class="row">
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">إسم الشركة:</label>
            <input type="text" name="company_name" value="{{$supplier->company_name}}" id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">تم تأكيد البيانات:</label>
            <input type="checkbox" name="verified" {{$supplier->verified ? 'checked':''}} id="name" placeholder="" class="form-control rounded-lg">
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="name">نوع الشركة:</label>
            <select name="type" id="name" placeholder="" class="form-control rounded-lg">
              <option value="مصنع" {{$supplier->type == 'مصنع'?'selected':''}}>
                مصنع
              </option>
              <option value="مورد" {{$supplier->type == 'مورد'?'selected':''}}>
                مورد
              </option>
            </select>
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3">شعار الشركة:</label>
            <div class="d-flex">
              <div>
                <img id="companyImg" style="width: 50px;height:50px;" src="{{asset($supplier->company_logo ?? 'assets/xd/icons/file.png')}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input  id="companyImgUpload" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="company_logo">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="type"> القسم</label>
            <select id="dept" type="text" name="departments[]" id="type" placeholder="" class="form-control rounded-lg border select2" multiple>
              @foreach($departments as $d)
              <option value="{{$d->id}}" {{$supplier->departments->contains($d->id)?'selected':''}}>{{$d->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="mb-3" for="type"> الفئة</label>
            <select id="category" type="text" name="categories[]" id="type" placeholder="" class="form-control rounded-lg border select2" multiple>
              @foreach($categories as $c)
              <option value="{{$c->id}}" {{$supplier->categories->contains($c->id)?'selected':''}}>{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-12">
            <label class="mb-3" for="name">تصنيفات المنتج:</label>
            <select name="tagproduct[]" value="{{$supplier->company_name}}" id="name" placeholder="" class="form-control rounded-lg border select2" multiple>
              @foreach($tagproducts as $tag)
              <option value="{{$tag->id}}" {{$supplier->tagproducts->contains($tag->id)?'selected':''}}>{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
            <select name="state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary select2">
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
            <input type="text" name="employees_number" value="{{$supplier->employees_number}}" id="emp-number" placeholder="" class="form-control rounded-lg">

          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صورة فريق العمل:</label>
            <div class="d-flex">
              <div>
                <img id="teamImg" style="width: 50px;height:50px;" src="{{asset('storage/'.$supplier->team_photo)}}" alt="">
              </div>
              <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                <div class="py-2 mx-auto">
                  <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                </div>
                <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                  <input id="teamImgUpload" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="team_photo">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> الكتالوج:</label>
              <div class="d-flex" style="max-width: 300px;">
                  <a href="{{asset($supplier->company_cataloge)}}" target="_blank">
                      <img id="prevCataloge" style="width: 50px;height:50px;" src="{{asset($supplier->company_cataloge)}}" alt="">
                  </a>
                  <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                      <div class="py-2 mx-auto">
                          <img class="w-30 float-right" src="/assets/xd/icons/file.png" alt="">
                      </div>
                      <div class="p-1">
                          <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;height: 40px;"> إستعراض الملفات
                              <input data-imgid="#prevCataloge" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" name="company_cataloge">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group col-12">
            <label class="mb-3" for="team_description">   وصف فريق العمل</label>
            <textarea type="text" name="team_description" id="team_description" placeholder="" class="form-control rounded-lg" rows="3">{{$supplier->team_description}}</textarea>

          </div>

        </div>
        <hr>
        <div class="row">
          <div class="form-group col-12">
            <label class="mb-3" for="name">الجودة و مطابقة المواصفات:</label>
            <textarea type="text" name="quality"  id="name" placeholder="" class="form-control rounded-lg">{{$supplier->quality}}</textarea>
          </div>
          <div class="form-group col-md-6" style="clear: right;">
            <label class="mb-3"> صور الجودة و مطابقة المواصفات:</label>
            <div class="d-flex">
              <div id="qualityImgs">
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
                  <input id="qualityImgsUpload" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="quality_files[]" multiple>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
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
          <hr>
          <div class="row">
              <div class="form-group col-md-6">
                  <label class="mb-3" for="instagram">إنستغرام</label>
                  <input type="url" name="instagram" value="{{$supplier->instagram}}" id="instagram" placeholder="" class="form-control rounded-lg">
              </div>
              <div class="form-group col-md-6">
                  <label class="mb-3" for="facebook">فيسبوك</label>
                  <input type="url" name="facebook" value="{{$supplier->facebook}}" id="facebook" placeholder="" class="form-control rounded-lg">
              </div>
          </div>
        <hr>
        <div class="row">

          <div class="col-12 d-flex">
              <div class="row">
                  <div class="form-group col-12">
                      <label class="mb-3" for="name">لمنتجات:</label>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary rounded">إضافة منتج</button>
                  </div>
              </div>
          </div>
          @foreach($supplier->products as $p)
          <div class="col-lg-4 col-md-6 col-12" id="product{{$p->id}}" data-id="{{$p->id}}">

            <div class="mx-2 my-3 rounded-lg border border-secondary media">
              <img class="p-3" width="100px" src="{{asset('storage/'.$p->img)}}" alt="">
              <div class="my-6 pr-3">
                  {{$p->name}}
                  <div>
                      <span onclick="editProduct('#product'+{{$p->id}},'{{route('dashboard.suppliers.edit_product',$p->id)}}','{{$p->name}}')"><i class="fa fa-edit"></i></span>
                      <span onclick="productDelete{{$p->id}}.submit(confirm('هل تريد مسح هذا المنتج؟'))"><i class="fa fa-trash text-danger"></i></span>
                  </div>
                  <form method="post" class="d-none" action="{{route('dashboard.suppliers.delete_product',$p->id)}}" name="productDelete{{$p->id}}">
                    @csrf
                  </form>
              </div>
            </div>

          </div>
          @endforeach
        </div>
      </form>
        <hr>
        <button onclick="$('#editSupplier').submit()" class="btn btn-primary btn-sm rounded px-6">حفظ</button>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">إضافة منتج</h5>
            </div>
            <form class="modal-body" action="{{route('dashboard.suppliers.add_product',$supplier)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>إسم المنتج</label>
                    <input name="name" type="text" class="form-control rounded-lg" required>
                </div>
                <div class="form-group" style="clear: right;">
                    <label class="mb-3">قم بإضافة صورة</label>
                    <div class="d-flex">
                        <div class="px-3 py-1 mr-3  d-flex  w-80 border border-primary-dotted rounded-lg">

                            <div class="py-2 mx-2 w-30">
                                <img id="productId" src="/assets/xd/icons/file.png" alt="">
                            </div>
                            <div class="btn btn-sm rounded btn-primary w-70" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" data-imgid="#productId" class="ml-2 m-0 imgPreviewInputFinal" name="img" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary rounded-lg">إضافة</button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="editProductLabel">تعديل منتج</h5>
            </div>
            <form class="modal-body" action="_" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>إسم المنتج</label>
                    <input name="name" type="text" class="form-control rounded-lg" id="name" required>
                </div>
                <div class="form-group" style="clear: right;">
                    <label class="mb-3">قم بإضافة صورة</label>
                    <div class="d-flex">
                        <div class="px-3 py-1 mr-3  d-flex  w-80 border border-primary-dotted rounded-lg">

                            <div class="py-2 mx-2 w-30">
                                <img id="productId" src="/assets/xd/icons/file.png" alt="">
                            </div>
                            <div class="btn btn-sm rounded btn-primary w-70" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" data-imgid="#productId" class="ml-2 m-0 imgPreviewInputFinal" name="img">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary rounded-lg">تعديل</button>
            </form>
        </div>
    </div>
</div>
