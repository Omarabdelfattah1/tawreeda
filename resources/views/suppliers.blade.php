@extends('layouts.app')

@section('styles')
<style>
  @media(min-width:1200){

}

@media(max-width:994px){

  #categories{
    display: none !important;
  }
}

@media(max-width:575px)
{

  .card{
    width:80%
  }
}
</style>
@endsection
@section('content')


<nav id="sub-nav" class="border-bottom d-flex justify-content-between" style="height: 50px;border-color: #535669;">

  <a class="nav-item nav-link dropdown-toggle text-primary border-left bg-secondary text-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 150px;">
        جميع الفئات
    </a>
    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
      @foreach($categories as $category)
      <a href="{{route('suppliers',$category)}}" class="dropdown-item py-3 {{$category->id == explode('/',app('request')->url())[3] ?'text-primary':''}}" href="{{route('suppliers',$category)}}">{{$category->name}}</a>
    @endforeach
    </div>
  <div class="w-90 d-flex" id="categories">
    @foreach($categories as $category)
    <a href="{{route('suppliers',$category)}}" class="mr-6 {{$category->id == explode('/',app('request')->url())[3] ?'text-primary border-bottom border-primary':'text-default'}} py-3" href="">{{$category->name}}</a>
    @endforeach
  </div>

</nav>
<div class="container">
  <div class="mt-5 d-flex  flex-warp" style="position:relative;" id="main">
    @livewire('filtersuppliers',[
      'category'=> $category_id
      ])
  </div>
</div>
@endsection
@section('scripts')
<script>
  // $(document).ready(function(){

  //   $(document).on('click', 'a.paginate', function(event){
  //   event.preventDefault();
  //   var page = $(this).attr('href');
  //   fetch_data(page);
  //   });

  //   function fetch_data(page)
  //   {
  //     $.ajax({
  //       url:page,
  //       success:function(data)
  //       {
  //         $('#suppliers').html(data);
  //       }
  //     });
  //   }

  // });
    var navH = $('.navbar').outerHeight();
    $(document).ready(function(){
      $('#sub-nav').css({'margin-top': navH})
    })

    $('#side-btn').on('click',function(){
      event.stopPropagation();
      $('#sidebare').toggleClass('sidebare-active');
    })

  window.addEventListener('click', function(e){
    if (!document.getElementById('sidebare').contains(e.target)){
      $('#sidebare').removeClass('sidebare-active');
    }
  });


  </script>
@endsection
