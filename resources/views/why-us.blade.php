@extends('layouts.app')

@section('content')

  <header class="header " style="background-color:#fafafa ;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-right pt-6 mt-6">
          
          <h2 class="text-primary mb-5 text-big">إزاي توريدة هتفيدك؟</h2>
          <h2 class="text-default  text-big">إنت مين؟</h2>
          <div class="mt-5 row my-6 pr-4">
            <a href="/why-us-supplier" class="px-2 col-4 ml-6 btn btn-lg rounded-lg btn-primary text-md">بتبيع منتج</a>
            <a href="/why-us-buyer" class="col-4 px-2 btn btn-lg rounded-lg btn-outline-primary text-md">عاوز منتج</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="assets/xd/imgs/why-us.png" alt="">
        </div>
      </div>
    </div>  
      
  </header>
@endsection