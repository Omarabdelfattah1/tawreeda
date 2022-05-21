@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between pt-6">
          <div class="text-right" style="font-size:30px;">
            الفئات
          </div>
          <div>

          <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary rounded">إضافة فئة</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel">إضافة فئة</h5>
                </div>
                <form class="modal-body" enctype="multipart/form-data"action="{{route('dashboard.categories.store')}}" method="post">
                  @csrf
                  <input type="hidden" name="department_id" value="{{$department->id}}" id="">
                  <div class="form-group row">
                    <label class="col-4">إسم الفئة</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group col-md-6" style="clear: right;">
                    <label class="mb-3">قم بإضافة صورة</label>
                    <div class="d-flex">
                      <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                        <div class="py-2 mx-auto">
                          <img class="w-30 float-right" id="previewCategory" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                          <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2 imgPreviewInputFinal" data-imgid="#previewCategory" name="dep_img">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary rounded-lg">إضافة</button>
                </form>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="pt-6">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach
          @endif
          <div id="tbl" class="text-dark p-2 w-100" style="display:table;border-collapse: collapse;">
            <div id="tbl-header" style="font-size: 14px;display:table-row;" class="text-primary font-weight-bold">
              <div  class="py-3" style="display:table-cell;padding:6px;">الصورة</div>
              <div  class="py-3" style="display:table-cell;padding:6px;">الإسم  </div>
              <div  class="py-3" style="display:table-cell;padding:6px;">عدد المنتجات  </div>
              <div  class="py-3" style="display:table-cell;padding:6px;">المنتجات  </div>
              <div  class="py-3" style="display:table-cell;padding:6px;">التعديل</div>
            </div>

            @foreach($categories as $category)
            <div style="display:table-row;font-size:12px;width: auto;clear: both;border-bottom: 4px solid #F4F4F4 !important;" class="sm-tbl-row bg-white">

              <div style="display:table-cell" class="sm-tbl-cell">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الصورة</div>

                <div style="padding:6px;"  class=" sm-tbl-cell-header text-primary">
                  <div class="media">
                    <img src="{{asset($category->img)}}" alt="" style="width: 40px;">

                  </div>
                </div>
              </div>
              <div style="display:table-cell" class="sm-tbl-cell">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الإسم</div>

                <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                  {{$category->name}}
                </div>
              </div>
              <div style="display:table-cell" class="sm-tbl-cell">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">عدد المنتجات</div>

                <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                  {{$category->tagproducts_count}}
                </div>
              </div>
              <div style="display:table-cell" class="sm-tbl-cell">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">المنتجات</div>

                <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                  <a href="{{route('dashboard.categories.show',$category)}}">عرض المنتجات</a>
                </div>
              </div>
              <div style="display:table-cell;" class="sm-tbl-cell mr-auto">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">التعديل</div>
                <div class="d-flex py-3 sm-tbl-cell-header" style="padding:6px;"  >
            <button class="ml-2 btn btn-none p-0" data-toggle="modal" data-target="#edit{{$category->id}}">
            <i class="fa fa-edit" alt="" ></i>
              تعديل
            </button>


            <form action="{{route('dashboard.categories.destroy',$category)}}" method="post">

                @csrf
                @method('delete')
                <button class="ml-2 btn btn-none p-0" type="submit">
                <span >
                <i class="fa fa-trash text-danger" alt=""></i>
                  مسح
                </span>
                </button>
            </form>
          </div>
          <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="editLabel">تعديل فئة</h5>
                </div>
                <form action="{{route('dashboard.categories.update',$category)}}" method="post" class="modal-body" enctype="multipart/form-data">
                  @method('put')
                  @csrf
                  <div class="form-group row">
                    <label class="col-4">إسم الفئة</label>
                    <input name="name" value="{{$category->name}}" type="text" class="form-control col-8 rounded-lg" id="">
                  </div>
                  <div class="form-group col-md-6" style="clear: right;">
                    <label class="mb-3">(175*130)قم بإضافة صورة</label>
                    <div class="d-flex">
                      <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded-lg">

                        <div class="py-2 mx-auto">
                          <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
                        </div>
                        <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> إستعراض الملفات
                          <input type="file" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="dep_img">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary rounded-lg">تعديل</button>
                </form>
              </div>
            </div>
          </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      @endsection
