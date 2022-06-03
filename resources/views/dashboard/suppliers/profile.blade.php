<div class="tab-pane  fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="pt-6 p-4">
          <form action="{{route('dashboard.suppliers.update',$supplier)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="profile" value="profile" id="">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="mb-3" for="name">إسم المستخدم:</label>
                <input type="text" name="name" value="{{$supplier->user->name}}" id="name" placeholder="" class="form-control rounded-lg">
                @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="mb-3" for="name"> رقم الموبيل:</label>
                <input type="text" name="mobile" value="{{$supplier->user->mobile}}" id="name" placeholder="" class="form-control rounded-lg">
                  @error('mobile')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="mb-3" for="name">  عنوان البريد الإلكتروني:</label>
                <input type="text" name="email" value="{{$supplier->user->email}}" id="name" placeholder="" class="form-control rounded-lg">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="mb-3" for="name">  نبذة عن صفة المستخدم:</label>
                <input type="text" name="summary" value="{{$supplier->user->summary}}" id="name" placeholder="" class="form-control rounded-lg">
                  @error('summary')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6" style="clear: right;">
                <label class="mb-3"> صورة المستخدم:</label>
                  <div class="d-flex">
                      <div>
                          <img id="profileImg" class="rounded-circle" style="width: 50px;height:50px;" src="{{asset(auth()->user()->photo)}}" alt="">
                      </div>
                      <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                          <div class="py-2 mx-auto">
                              <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
                          </div>
                          <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                              <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" data-imgid="#profileImg" name="photo">
                          </div>
                      </div>
                  </div>
                </div>
                  @error('photo')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>

              <div class="form-group col-md-6">
                <label class="mb-3" for="password">  كلمة المرور:</label>
                <input type="password" name="password" id="password" placeholder="" class="form-control rounded-lg">
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="mb-3" for="password">  تأكيد كلمة المرور:</label>
                <input type="password" name="password_confirmation" id="password" placeholder="" class="form-control rounded-lg">
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="mb-3" for="password"> إيقاف الحساب:</label>
                <input type="checkbox" name="locked" {{$supplier->user->locked ? 'checked':''}} id="name" placeholder="" class="form-control rounded-lg">

              </div>
            <button class="btn btn-primary btn-sm rounded px-6" type="submit">حفظ</button>
          </form>
        </div>
      </div>
