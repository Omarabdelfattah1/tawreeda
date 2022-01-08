@foreach($suppliers as $supplier)
        
<div class="col-lg-4 col-md-6 col-sm-8 text-center mb-6">
  <div class="card shadow-lg px-2 pb-3 mx-auto" style="position: relative;margin-top: 20%;">
    <a href="{{route('supplier',$supplier)}}">
    <img src="{{asset($supplier->company_logo)}}" class="mx-auto pt-6" alt="" style="width:35%;position: absolute; top:-50%;left:32.5%;z-index: 11;padding-top: 50px;">
    </a>
    <h6 class="lead-3 font-weight-bold text-center pt-5" style="margin-top: 15%;padding-top: 2%;"> {{$supplier->company_name}}</h6>
    <p class="fs-5 mt-3 text-center">
      <?php 
        echo str_repeat('<span class="fa fa-star" style="color: #f8c848;"></span>',(int)$supplier->stars()).
        str_repeat('<span class="fa fa-star"></span>',5-(int)$supplier->stars());
      ?>  | {{$supplier->reviews->count()}} تقييم
    </p>
    <div class="d-flex mt-3 fs-6 p-1 text-center">
      @if($supplier->type)
      <div class="btn btn-xs mx-auto" style="color:white;background-color: #FF3737;">{{$supplier->type}}</div>
      @endif
      <div class="btn btn-xs mx-auto" style="color:white;background-color: #44485C;">{{$supplier->state}}</div>
      @if($supplier->tagproducts()->first())
      <div class="btn btn-xs btn-secondary text-default mx-auto" >{{$supplier->tagproducts()->first()->name}}</div>
      @endif 
    </div>
  </div>
</div>
@endforeach