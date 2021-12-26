@extends('layouts.app-test')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('test')
<header  class="header pb-3">
      <div class="container">
    
    <div class="row">
        <header class="section-header col-md-6 col-xl-6 text-center mb-5 ">
            <h2 class="lead-6 fs-1 text-primary" style="font-weight: 700;">تسجيل موردين</h2>
            <p class="lead-3 text-default mt-6 lh-lg">املا البيانات دي  عشان تقدر تعرض منتجاتك  علي توريدة</p>
            
            <hr>
        </header>
    </div>
    <div class="row">
      @livewire('register-supplier')
      </div>
</div>
    </header>

@endsection