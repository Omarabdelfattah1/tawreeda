@extends('layouts.dashboard')
@section('content')
    <div class="text-right" style="font-size:30px;">
        الإعدادات
    </div>


    <div class="pt-6 w-100">
        <div class="bg-white">
            <div class="pt-6 p-4">
                <form action="{{route('dashboard.settings.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="mb-3" for="name">رقم الهاتف:</label>
                            <input type="number" name="phone" value="{{$settings['phone']??''}}" id="name" placeholder="" class="form-control rounded-lg">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-3" for="name">فيسبوك :</label>
                            <input type="url" name="facebook" value="{{$settings['facebook']??''}}" id="name" placeholder="" class="form-control rounded-lg">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-3" for="name">تويتر:</label>
                            <input type="url" name="twitter" value="{{$settings['twitter']??''}}" id="name" placeholder="" class="form-control rounded-lg">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-3" for="name">إنستغرام:</label>
                            <input type="url" name="instagram" value="{{$settings['instagram']??''}}" id="name" placeholder="" class="form-control rounded-lg">
                        </div>
                        <div class="form-group col-md-6" style="clear: right;">
                            <label class="mb-3">شعار الموقع:</label>
                            <div class="d-flex">
                                <div >
                                    <img id="logoPreview" style="width: 50px;height:50px;" src='{{isset($settings['logo'])?asset('storage/'.$settings['logo']):''}}' alt="">
                                </div>
                                <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                                    <div class="py-2 mx-auto">
                                        <img class="w-30 float-right" src="../assets/xd/icons/file.png" alt="">
                                    </div>
                                    <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                                        <input id="logoInput" type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="logo">
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
        $('#logoInput').on('change', function() {
            readURL(this, '#logoPreview');
        });
    </script>
@endsection
