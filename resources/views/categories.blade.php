@extends('layouts.app')

@section('content')

<header class="header pb-5">
    <div class="container text-center">
      <div class="row gap-y">
        @foreach($categories as $category)
        <div class="col-lg-2 col-md-4 col-6">
          <div class="card border border-secondary hover-shadow-12 mb-6 w-90 mx-auto rounded-lg p-0">
            <a href="{{route('suppliers',$category)}}">
              <img style="height:130px;width:100%;" class="card-img-top" src="{{asset('storage/'.$category->img)}}" alt="Card image cap">
            </a>
            <div class="py-3 text-center">
              <p class=" text-center">
                <a class="text-default lead-2" href="{{route('suppliers',$category)}}">{{$category->name}}</a>
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </header>
@endsection
