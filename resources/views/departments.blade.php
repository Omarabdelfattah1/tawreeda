@extends('layouts.app')

@section('content')
<header class="header pb-5">
  <div class="container text-center">
    <h1 class="text-primary mb-5 text-center" style="font-size: 50px;">الموردين</h1>
    <h3 class="text-default mb-6 text-center" style="font-size: 30px;">إختر الفئة التي تبحث عنها</h3>
    <div class="row mt-6 ">
      <div class="col-9 row mx-auto justify-content-between ">
        @foreach($departments as $d)
        <a href="{{route('categories',$d)}}" class="col-md-5 col-12 p-3 mx-auto my-6 d-block" style="position:relative;">
          <img src="{{asset('assets/xd/suppliers1.png')}}" alt="" style="width:20%;position:absolute;bottom: 0;left: 0;z-index: -1;">
          <img src="{{asset('assets/xd/suppliers2.png')}}" alt="" style="width:20%;position:absolute;top: 0; right: 0;z-index: -1;">
          <img src="{{asset('assets/xd/suppliers3.png')}}" alt="" style="position:absolute;bottom: 3%;left: 10;width: calc(100.00% - 22px);">
          <div class="text-white text-md text-center" style="position:absolute;bottom: 9%;left: 10;width: calc(100.00% - 22px);">{{$d->name}}</div>
          <img src="{{asset('storage/'.$d->img)}}" alt="" style="z-index: 1;width:100%;height:100%;">
        </a>
        @endforeach
      </div>
    </div>
    
  </div>  
    
</header>
@endsection
