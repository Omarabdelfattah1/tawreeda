@extends('layouts.app-test')
@section('styles')
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
    </style>
@endsection
@section('test')
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    <form class="col-md-8 mx-auto"  enctype="multipart/form-data">
        @csrf
        <div class="tab">
            <div class="form-group">
                <label for="company-name" class="float-right mb-5">إسم الشركة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <input id="company-name"  value="{{old('company_name')}}" name="company_name" class="form-control form-control-lg rounded-lg border border-secondary">
                @error('company_name')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group" >
                <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
                <select  name="state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary">
                    <option value="" selected>--إختر المحافظة--</option>
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
                <input  id="company-address" value="{{old('company_address')}}" name="company_address" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب العنوان كاملاً">
                @error('company_address')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="details" class="float-right mb-5">:   نبذة عن الشركة  <span class="text-danger" style="font-size:20px;">*</span></label>
                <textarea  name="about" class="form-control rounded-lg border border-secondary" id="details"rows="5" placeholder="أكتب نبذة عن الشركة">{{old('about')}}</textarea>
                @error('about')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="tab">

            <div class="form-group">
                <label for="crn" class="float-right mb-5">رقم السجل التجاري إن وجد</label>
                <input  id="crn" name="company_CRN" value="{{old('company_CRN')}}"  class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_CRN')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tax" class="float-right mb-5"> البطاقة الضريبية إن وجد</label>
                <input  id="tax" name="company_TXCard" value="{{old('company_TXCard')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
                @error('company_TXCard')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="emp" class="float-right mb-5"> عدد الموظفين <span class="text-danger" style="font-size:20px;">*</span></label>
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
                <label  class="float-right mb-5"> عندك كتالوج؟</label>
                <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

                        <div class="py-2 mx-autos">
                            <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> تحميل الكاتالوج
                            <input type="file" value="{{old('cataloge')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 w-100 h-100" name="cataloge">
                        </div>
                    </div>

                </div>
                <div class="text-right">

                    <img src="" style="width:100px;height:100px;" alt="">
                </div>
                @error('cataloge')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label for="dept" class="float-right mb-5">القسم</label>
                <select id="dept" name="department_id" class="select form-control form-control-lg bg-white rounded-lg border" data-style="">
                    <option disabled selected>--من فضلك إختر القسم أولاً--</option>
                    @foreach($departments as $d)
                        <option value="{{$d->id}}" {{old('department_id')==$d->id?'selected':''}}>{{$d->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group clearfix">
                <label for="category" class="float-right mb-5">الفئة</label>
                <select id="category" name="category_id" class="select form-control form-control-lg bg-white rounded-lg border">
                    <option disabled selected>--من فضلك إختر الفئة ثانياً--</option>

                </select>

            </div>
            <div class="form-group clearfix">
                <label for="tagproduct" class="float-right mb-5">المنتجات</label>
                <select id="tagproduct" name="tagproducts[]" class="form-control form-control-lg bg-white rounded-lg border" multiple>


                </select>

            </div>
        </div>
        <div class="tab">
            <div class="form-group clearfix">
                <label for="name" class="float-right mb-5">إسم المستخدم <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="name" name="name" value="{{old('name')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="الإسم">

                @error('name')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label for="user-email" class="float-right mb-5"> عنوان البريد الإلكتروني إن وجد</label>
                <input type="email"  id="user-email" value="{{old('email')}}" name="email" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="البريد الإلكتروني">

                @error('email')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label for="summary" class="float-right mb-5">  نبذة عن صفة المستخدم  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="summary" value="{{old('summary')}}" name="summary" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : صاحب الشركة و مدير تنفيذي">

                @error('summary')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group my-6">
                <label  class="float-right mb-5">  الصورة الشخصية</label>
                <div class="d-flex">
                    <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">
                        <div class="py-2 mx-autos">
                            <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                            <input  type="file" value="{{old('photo')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="photo">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <img src="" style="width:100px;height:100px;" alt="">
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
                <label for="user-phone" class="float-right mb-5">رقم الموبيل  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input type="number"  id="user-phone" value="{{old('mobile')}}" name="mobile" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="رقم الموبيل">
                @error('mobile')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="float-right mb-5">  كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="password" name="password" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
                @error('password')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="float-right mb-5">  تأكيد كلمة المرور  <span class="text-danger" style="font-size:20px;">*</span></label>
                <input  id="password-confirm" name="password_confirmation" class="form-control form-control-lg rounded-lg border border-secondary" type="password">
                @error('password_confirmation')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="form-group text-center">
            <button type="button" id="nextBtn" onclick="nextPrev(1)"  class="btn rounded-lg  btn-primary p-3  w-10 mt-5"> التالي</button>

            <button id="prevBtn" onclick="nextPrev(-1)" class="btn rounded-lg btn-xl btn-secondary ml-auto mt-5">
                السابق
            </button>
        </div>
    </form>




@endsection
@section('scripts')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
@endsection
