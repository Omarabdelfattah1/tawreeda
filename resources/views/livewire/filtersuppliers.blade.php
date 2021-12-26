<div class="w-100">
  <div class="container">

    <div class="mt-5 d-flex  flex-warp" style="position:relative;" id="main">
      <div class="text-right ml-5" id="sidebare">
        <div class="bg-primary p-3 rounded">المحافظة</div>
        <ul class="list-group px-2" id="states" style="height:250px;overflow:auto;">
          <li class="list-group-item"><input type="checkbox" class="ml-3">كل المحافظات </li>
          @foreach(config('states') as $state)
          <li class="list-group-item">
            <input type="checkbox" wire:model="states.{{$state}}" value="{{$state}}" class="ml-3 states">
            {{$state}}
          </li>
          @endforeach
        </ul>
        <h6 class="mt-3 text-default">تصفية حسب</h6>
        <div class="bg-primary p-3 rounded mt-6">التقييم</div>
        <ul class="list-group px-2" id="reviews">

          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="0">
            <span>مسح</span>
          </li>
          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="5">
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
          </li>
          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="4">
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span> أو أكثر
          </li>
          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="3">
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span> أو أكثر
          </li>
          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="2">
            <span class="fa fa-star" style="color: orange;"></span>
            <span class="fa fa-star" style="color: orange;"></span> أو أكثر
          </li>
          <li class="list-group-item">
            <input type="radio" wire:model="review" class="states" value="1">
            <span class="fa fa-star" style="color: orange;"></span> أو أكثر
          </li>
        </ul>
        <div class="bg-primary p-3 rounded">الإعتماد</div>
        <ul class="list-group px-2">
          <li class="list-group-item"><input type="radio" wire:model="verified" value="" class="ml-3">الكل</li>
          <li class="list-group-item"><input type="radio" wire:model="verified" value="1" class="ml-3">حساب مؤكد </li>
          <li class="list-group-item"><input type="radio" wire:model="verified" value="0" class="ml-3">حساب غير مؤكد</li>
        </ul>
        <div class="bg-primary p-3 rounded">عرض</div>
        <ul class="list-group px-2">
          <li class="list-group-item"><input type="radio" wire:model="type" value="" class="ml-3">الكل</li>
          <li class="list-group-item"><input type="radio" wire:model="type" value="مصنع" class="ml-3">مصنعين</li>
          <li class="list-group-item"><input type="radio" wire:model="type" value="مورد" class="ml-3">موردين</li>
        </ul>
      </div>
      <div class="px-1 w-100" id="content">
      <div class="d-flex justify-content-between">
          <button style="height: 50px;" id="side-btn" class="btn rounded-lg btn-sm btn-secondary py-1 "><i class="fa fa-bars"></i></button>
          <div class="text-left py-3 mr-auto" style="width: 200px;"> 
            <div class="d-flex">
              <h6 class="py-2 ml-3">الترتيب</h6>
              <select class="form-control rounded-lg" name="" id="">
                <option value="">إختر</option>
              </select>
            </div>
          </div>
        </div>
          <div class="row mt-6" id="suppliers">
      
          @include('includes.suppliers')
        </div>
        
          {{$suppliers->links()}}
      </div>
    </div>
  </div>
</div>
