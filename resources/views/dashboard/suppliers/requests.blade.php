<div class="tab-pane  fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="border-right:0px !important;color: #6F6F6F !important;background: none !important;">
        <div class="text-right bg-white">
          <div class="pt-6">
            @foreach($supplier->offers as $offer)
            <div class="row m-3" style="background-color: #FAFAFA">
              <div class="col-md-2 p-2 text-center"><img class="mr-3" style="width: 100px;" src="{{asset('storage/'.$supplier->company_logo)}}" alt=""></div>
              <div class="col-md-8">
                <h6 class="py-1 font-weight-bold">
                  {{$supplier->company_name}}
                
                </h6>
                <p style="line-height: 1rem;font-size: 12px;">{{$offer->request->description}}</p>
                <div class="row mt-3">
                  <div class="col-md-4 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/icons/recevied.png')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold">{{$supplier->user->name}}</h6>
                  </div>
                  <div class="col-md-3 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/clock.svg')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold">{{$offer->request->created_at->diffForHumans()}}</h6>
                  </div>
                  <div class="col-md-5 media mb-3">
                    <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/cup.png')}}" alt="">
                    <h6 style="font-size: 12px;" class="font-weight-bold"> أكواب ورقية . أطباق بلاستيك </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-2 p-2">
                <div class="media">
                  <img style="width:20px;" class="ml-2" src="{{asset('assets/xd/cup.png')}}" alt="">
                  <h6 style="font-size: 12px;" class="font-weight-bold"> {{count($offer->request->offers)}} عروض مقدمة</h6>
                </div>
                <a href="offered-details.html" class="btn mt-5 mx-4 text-primary" style="background-color: #FFF7F2;">العروض</a>

              </div>
            </div>
            @endforeach
          </div>
        
        </div>
      </div>