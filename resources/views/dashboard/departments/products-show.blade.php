@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between pt-6">
          <div class="text-right" style="font-size:30px;">
            المنتجات
          </div>
          <div>

          <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary rounded">إضافة منتج</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel">إضافة منتج</h5>
                </div>
                <form class="modal-body" action="{{route('dashboard.products.store')}}" method="post">
                  @csrf
                  <input type="hidden" name="category_id" value="{{$category->id}}" id="">
                  <div class="form-group row">
                    <label class="col-4">إسم المنتج</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control col-8 rounded-lg" id="">
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
              <div  class="py-3" style="display:table-cell;padding:6px;">الإسم  </div>
            </div>

            @foreach($category->tagproducts as $product)
            <div style="display:table-row;font-size:12px;width: auto;clear: both;border-bottom: 4px solid #F4F4F4 !important;" class="sm-tbl-row bg-white">

              <div style="display:table-cell" class="sm-tbl-cell">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">الإسم</div>

                <div style="padding:6px;"  class="py-3 sm-tbl-cell-header">
                  {{$product->name}}
                </div>
              </div>
              <div style="display:table-cell;" class="sm-tbl-cell mr-auto">
                <div style="display:none;padding:6px;" class="py-3 sm-tbl-cell-header text-primary">التعديل</div>
                <div class="d-flex py-3 sm-tbl-cell-header" style="padding:6px;"  >
            <button class="ml-2 btn btn-none p-0" data-toggle="modal" data-target="#edit{{$product->id}}">
            <i class="fa fa-edit" alt="" ></i>
              تعديل
            </button>


            <form action="{{route('dashboard.products.destroy',$product)}}" method="post">

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
          <div class="modal fade" id="edit{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-primary" id="editLabel">تعديل منتج</h5>
                </div>
                <form action="{{route('dashboard.products.update',$product)}}" method="post" class="modal-body">
                  @method('put')
                  @csrf
                  <div class="form-group row">
                    <label class="col-4">إسم المنتج</label>
                    <input name="name" value="{{$product->name}}" type="text" class="form-control col-8 rounded-lg" id="">
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
