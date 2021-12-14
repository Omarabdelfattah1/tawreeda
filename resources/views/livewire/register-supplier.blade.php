<div class="container">
    <div class="row">
        <header class="section-header col-md-6 col-xl-6 text-center mb-5 ">
            <h2 class="lead-6 fs-1 text-primary" style="font-weight: 700;">تسجيل موردين</h2>
            <p class="lead-3 text-default mt-6 lh-lg">املا البيانات دي  عشان تقدر تعرض منتجاتك  علي توريدة</p>
            
            <hr>
        </header>
    </div>
    <div class="row">
        <form class="col-md-8 mx-auto" wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            @if ($currentPage === 1)
            <div class="form-group">
                <label for="company-name" class="float-right mb-5">إسم الشركة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <input id="company-name" wire:model.lazy="feilds.supplier.company_name" value="{{old('company_name')}}" name="company_name" class="form-control form-control-lg rounded-lg border border-secondary">
                @error('company_name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <select wire:model.lazy="feilds.supplier.state" name="state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary">
                @foreach(config('states') as $state)
                <option class="text-right" value="{{$state}}">
                    {{$state}}
                </option>
                @endforeach
                </select>
                @error('state')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="company-address" class="float-right mb-5">عنوان الشركة <span class="text-danger" style="font-size:20px;">*</span></label>
                <input wire:model.lazy="feilds.supplier.company_address" id="company-address" value="{{old('company_address')}}" name="company_address" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب العنوان كاملاً">
                @error('company_address')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="details" class="float-right mb-5">:   نبذة عن الشركة  <span class="text-danger" style="font-size:20px;">*</span></label>
                <textarea wire:model.lazy="feilds.supplier.about" name="about" class="form-control rounded-lg border border-secondary" id="details"rows="5" placeholder="أكتب نبذة عن الشركة">{{old('about')}}</textarea>
                @error('about')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dept" class="float-right mb-5">القسم <span class="text-danger" style="font-size:20px;">*</span></label>
                <select wire:model.lazy="feilds.supplier.department" name="department" id="dept" class="select text-right form-control form-control-lg rounded-lg border border-secondary text-default" multiple>
                @foreach($department as $d)
                <option class="text-right" value="{{$d->id}}" {{ (collect(old('department'))->contains($d->id)) ? 'selected':'' }}>
                    {{$d->name}}</option>
                @endforeach
                </select>
                @error('department')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category" class="float-right mb-5">الفئة</label>
                <select wire:model.lazy="feilds.supplier.categories" id="category" name="categories" class="select text-right form-control form-control-lg rounded-lg border border-secondary" multiple>
                @foreach($categories as $c)
                <option class="text-right" value="{{$c->id}}" {{ (collect(old('categories'))->contains($c->id)) ? 'selected':'' }}>
                    {{$c->name}}</option>
                @endforeach
                </select>
                @error('categories')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tagproduct" class="float-right mb-5">المنتج</label>
                <select wire:model.lazy="feilds.supplier.tagproducts" id="tagproduct" name="tagproducts" class="select text-right form-control form-control-lg rounded-lg border border-secondary" multiple>
                @foreach($tagproducts as $c)
                <option class="text-right" value="{{$c->id}}" {{ (collect(old('tagproducts'))->contains($c->id)) ? 'selected':'' }}>
                    {{$c->name}}</option>
                @endforeach
                </select>
                @error('tagproducts')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="crn" class="float-right mb-5">رقم السجل التجاري</label>
                <input wire:model.lazy="feilds.supplier.company_CRN" id="crn" name="company_CRN" value="{{old('company_CRN')}}"  class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_CRN')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror            
            </div>
            <div class="form-group">
                <label for="tax" class="float-right mb-5">البطاقة الضريبية</label>
                <input wire:model.lazy="feilds.supplier.company_TXCard" id="tax" name="company_TXCard" value="{{old('company_TXCard')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_TXCard')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="emp" class="float-right mb-5"> عدد الموظفين <span class="text-danger" style="font-size:20px;">*</span></label>
                <input wire:model.lazy="feilds.supplier.employees_number" id="emp" name="employees_number" value="{{old('employees_number')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 7">
                @error('employees_number')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-6">
                <label  class="float-right mb-5"> عندك كتالوج</label>
                <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                        <div class="py-2 mx-autos"> 
                        <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> تحميل الكاتالوج
                        <input wire:model.lazy="feilds.supplier.cataloge" type="file" value="{{old('cataloge')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="cataloge">
                        </div>
                    </div>
                </div>
                @error('cataloge')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @elseif($currentPage == 2)
            <input type="hidden" name="user_type" value="supplier" id="">
            <div class="form-group clearfix">
                <label for="name" class="float-right mb-5">إسم المستخدم <span class="text-danger" style="font-size:20px;">*</span></label>
                <input id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="الإسم">
            </div>
            @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group clearfix">
                <label for="user-phone" class="float-right mb-5">رقم الموبيل  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
            </div>
            @error('mobile')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group clearfix">
                <label for="user-email" class="float-right mb-5"> عنوان البريد الإلكتروني </label>
                <input id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="البريد الإلكتروني">
            </div>
            @error('email')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div class="form-group clearfix">
                <label for="title" class="float-right mb-5">  اللقب  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input name="title" id="" value="{{old('title')}}" class="form-control form-control-lg rounded-lg border border-secondary">
            </div>
            @error('title')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group clearfix">
                <label for="summary" class="float-right mb-5">  نبذة عن صفة المستخدم  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input id="summary" value="{{old('summary')}}" name="summary" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : صاحب الشركة و مدير تنفيذي">
            </div>
            @error('summary')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group my-6">
                <label  class="float-right mb-5">  الصورة الشخصية</label>
                <div class="d-flex">
                <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                    <div class="py-2 mx-autos"> 
                    <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                    </div>
                    <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                    <input type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
                    </div>
                </div>
                </div>
            </div>
            @error('photo')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group clearfix">
                <label for="password" class="float-right mb-5">  كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input id="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
            </div>
            <div class="form-group clearfix">
                <label for="password-confirm" class="float-right mb-5">  تأكيد كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input id="password-confirm" name="password_confirmation" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
            </div>
            @error('password')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @endif
            <div class="form-group text-center">
                
                @if ($currentPage === 1)
                <button wire:click="goToNextPage" type="button"  class="btn rounded-lg  btn-primary p-3  w-20 mt-5"> التالي</button>
                @endif
                @if ($currentPage === $pages)
                    <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5">
                    <!-- <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5" data-toggle="modal" data-target="#exampleModal"> -->
                    إرسال
                    </button>
                    <button wire:click="goToPreviousPage" class="btn rounded-lg btn-xl btn-secondary ml-auto mt-5">
                السابق
                </button>
                @endif
                
            </div>
            <!-- end-form -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content text-center p-3 rounded-lg">
                    <div class="modal-header">
                    <h5 class="modal-title text-primary mx-auto" id="exampleModalLabel">شكراً لإنضمامك لأسرة موردينا</h5>
                    
                    </div>
                    <div class="modal-body bg-primary rounded-lg">
                    هنتواصل معاك في أقرب وقت لتأكيد تسجيلك <br>
                    إستنا مننا رسالة على whatsapp
                    </div>
                </div>
                </div>
            </div>
            </div>
        </form>

    </div>
</div>