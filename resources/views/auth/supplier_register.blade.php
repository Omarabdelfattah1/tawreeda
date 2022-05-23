@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .tab {
            display: none;
        }
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }
        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
        input.invalid {
            background-color: #ffdddd;
        }
        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
@endsection
@section('content')
<div class="container mt-6 pt-6">
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>

    <form id="formRegister" class="col-md-8 mx-auto text-right" action="{{route('supplier.test.register')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div style="width: 200px !important;" class="text-center mx-auto">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div><br>
                @endforeach
            @endif
        </div>
        <div class="tab">
            <div class="form-group">
                <label for="company-name" class="mb-5">إسم الشركة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <input id="company-name"  value="{{old('company_name')}}" name="company_name" class="required form-control form-control-lg rounded-lg border border-secondary">
                @error('company_name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-6">
                <label  class="mb-5">شعار الشركة</label>
                <div style="width: 240px !important;" class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">
                    <div>
                        <img id="profileImg" style="width: 50px;height:50px;" src="/assets/xd/icons/file.png" alt="">
                    </div>
                    <div class="p-0 ">
                        <div class="btn btn-sm rounded btn-primary m-0 w-100 h-100 py-3" style="position: relative;overflow: hidden;"> إستعراض الملفات
                            <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" data-imgid="#profileImg" name="company_logo">
                        </div>
                    </div>
                </div>
                @error('company_logo')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group" >
                <label for="govern" class="mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <select style="width: 100%;" name="state" id="govern" class="select required form-control form-control-lg rounded-lg border border-secondary">
                    <option value="" disabled selected>--إختر المحافظة--</option>
                    @foreach(config('states') as $state)
                        <option class="text-right" value="{{$state}}" {{old('state') == $state ? 'selected':''}}>
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
                <label for="company-address" class="mb-5">عنوان الشركة <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="company-address" value="{{old('company_address')}}" name="company_address" class="required form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب العنوان كاملاً">
                @error('company_address')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="details" class="mb-5">:   نبذة عن الشركة  <span class="text-danger" style="font-size:20px;">*</span></label>
                <textarea  name="about" class="required form-control rounded-lg border border-secondary" id="details"rows="5" placeholder="أكتب نبذة عن الشركة">{{old('about')}}</textarea>
                @error('about')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="tab">

            <div class="form-group">
                <label for="crn" class="mb-5">رقم السجل التجاري إن وجد</label>
                <input  id="crn" name="company_CRN" value="{{old('company_CRN')}}"  class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_CRN')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tax" class="mb-5"> البطاقة الضريبية إن وجد</label>
                <input  id="tax" name="company_TXCard" value="{{old('company_TXCard')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_TXCard')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="emp" class="mb-5"> عدد الموظفين </label>
                <input  id="emp" name="employees_number" value="{{old('employees_number')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 7">
                @error('employees_number')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="tab">
            <div class="form-group my-6">
                <label  class="mb-5"> عندك كتالوج؟</label>
                <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                        <div class="py-2 mx-autos">
                            <img class="w-30  src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> تحميل الكاتالوج
                            <input type="file" id="catalogImage" value="{{old('cataloge')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="form-control ml-2 w-100 h-100" name="cataloge">
                        </div>
                    </div>

                </div>
                <div id="catalogPreview" class="text-right">

                </div>
                @error('cataloge')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @livewire('department-category-product')
        </div>
        <div class="tab">
            <div class="form-group clearfix">
                <label for="name" class="mb-5">إسم المستخدم <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="name" name="name" value="{{old('name')}}" class="form-control required form-control-lg rounded-lg border border-secondary" placeholder="الإسم">

                @error('name')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label for="user-email" class="mb-5"> عنوان البريد الإلكتروني إن وجد</label>
                <input type="email"  id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="البريد الإلكتروني">

                @error('email')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label for="summary" class="mb-5">  نبذة عن صفة المستخدم  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="summary" value="{{old('summary')}}" name="summary" class="form-control required form-control-lg rounded-lg border border-secondary" placeholder="مثال : صاحب الشركة و مدير تنفيذي">

                @error('summary')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group my-6">
                <label  class="mb-5">  الصورة الشخصية</label>
                <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">
                        <div class="py-2 mx-autos">
                            <img class="w-30  src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                            <input id="photoFile" type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="form-control ml-2" name="photo">
                        </div>
                    </div>
                </div>
                <div id="photoPreview" class="text-right">

                </div>
                @error('photo')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="tab">
            <div class="form-group clearfix">
                <label for="user-phone" class="mb-5">رقم الموبيل  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input type="number"  id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control required form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
                @error('mobile')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="mb-5">  كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="password" name="password" class="form-control form-control-lg required rounded-lg border border-secondary" type="password">
                @error('password')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="mb-5">  تأكيد كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="password-confirm" name="password_confirmation" class="form-control required form-control-lg rounded-lg border border-secondary" type="password">
                @error('password_confirmation')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="form-group text-center">
            <button type="button" id="nextBtn" onclick="nextPrev(1,event)"  class="btn rounded-lg btn-xl btn-primary mt-5"> التالي</button>

            <button id="prevBtn" onclick="nextPrev(-1,event)" class="btn rounded-lg btn-xl btn-secondary ml-auto mt-5">
                السابق
            </button>
        </div>
    </form>



</div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select').select2({
            placeholder: '--إختر--',
            selectionCssClass: "form-control form-control-lg rounded-lg border border-secondary h-10 w-100",
            // dropdownCssClass: "select2Option",
        });

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = $(".tab");
            console.log(x[n]);
            $(x[n]).show();
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                $("#prevBtn").hide();
            } else {
                $("#prevBtn").show();
            }
            if (n == (x.length - 1)) {
                $("#nextBtn").html("سجل");
            } else {
                $("#nextBtn").html("التالي");
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n,e) {
            // This function will figure out which tab to display
            e.preventDefault();
            var x = $(".tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            $(x[currentTab]).hide();
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById('formRegister').submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = $(".tab");
            console.log(x);
            y = $(x[currentTab]).find(".required");
            console.log(y);
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {

                if ($(y[i]).val() == "") {
                    var validat = "<span class='text-danger'>هذا الحقل مطلوب</span>";
                    $(y[i]).after(validat);
                    // and set the current valid status to false:
                    valid = false;
                }
            }

            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = $(".step");
            for (i = 0; i < x.length; i++) {
                $(x[i]).addClass("active");
            }
        }

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            var file = ``
                            $($.parseHTML(`<img class="mr-2" style="width:100px !important;height:100px !important;">`)).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#catalogImage').on('change', function() {
                imagesPreview(this, $('#catalogPreview'));
            });
            $('#photoFile').on('change', function() {
                imagesPreview(this, $('#photoPreview'));
            });

        });
    </script>
@endsection
