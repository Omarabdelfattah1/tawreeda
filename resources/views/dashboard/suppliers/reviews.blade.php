<div class="tab-pane  fade" id="customers" role="tabpanel" aria-labelledby="customers-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="text-right col-12">
          <div class="bg-white">
            <div class="pt-6">
            @foreach($supplier->reviews as $review)
            <div class="d-flex justify-content-between text-sm border-bottom mb-2">
              <div class="mb-2">
                <h6 class="mb-3">
                  <span class="fa fa-star" style="color: gold;"></span> {{$review->stars}} 
                  {{$review->title}}
                </h6>
                <h6> {{$review->comment}}</h6>              
              </div>
              <div>
                <h6 class="mb-1" style="font-size: xx-small;">
                {{$review->created_at->format('Y-m-d')}} 
                <form class="form-inline" action="{{route('dashboard.reviews.destroy',$review)}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-none text-primary p-0" href="" class="text-primary mr-2"><span class="fa fa-trash"></span></button>
                </form>
                </h6>
                <h6 class="mb-1"> {{$review->buyer->user->name}}</h6>              
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>