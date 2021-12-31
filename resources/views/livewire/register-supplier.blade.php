
<form class="col-md-8 mx-auto" wire:submit.prevent="submit" enctype="multipart/form-data">
    @csrf
    @if ($currentPage == 1)
        @include('auth.incs.supplier_register_1')
    @elseif($currentPage == 2)
        @include('auth.incs.supplier_register_2')
    @endif
    <div class="form-group text-center">
        
        @if ($currentPage == 1)
            <button wire:click="goToNextPage" type="button"  class="btn rounded-lg  btn-primary p-3  w-20 mt-5"> التالي</button>
        @endif
        @if ($currentPage == $pages)
            <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5">
            <!-- <button type="submit" class="btn rounded-lg btn-xl btn-primary ml-auto mt-5" data-toggle="modal" data-target="#exampleModal"> -->
            إرسال
            </button>
            <button wire:click="goToPreviousPage" class="btn rounded-lg btn-xl btn-secondary ml-auto mt-5">
        السابق
        </button>
        @endif
        
    </div>
</form>


