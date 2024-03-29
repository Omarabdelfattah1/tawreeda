<div class="dropdown nav-link ">
    <a id="notifications" class="dropdown-toggle p-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ __(' الإشعارات') }}
        @if($notifications_count>0)
      <span class="rounded-circle text-center" style="background-color: #ff2156;color: white;font-size:xx-small;height: 12px;width:12px;padding-right: 4px;padding-left:4px;">{{$notifications_count}}</span>
        @endif
    </a>
    @if($notifications_count>0)
        <div class="dropdown-menu dropdown-menu-left text-right" aria-labelledby="notifications" id="push-notification">
            @foreach($notifications as $notification)
                <div class="d-flex">
                    <p> <a class="dropdown-item" href="{{$notification->data['link']}}">
                    {{$notification->data['message']}}
                </a></p>
                <p>
                <button class="btn btn-none" wire:click='markAsRead("{{$notification->id}}")'>
                <i class="fa fa-check"></i>

                </button>

                </p>
            </div>
            @endforeach
        </div>
    @else
        <div class="dropdown-menu dropdown-menu-left text-right" aria-labelledby="notifications" id="push-notification">
            لا يوجد إشعارات
        </div>

    @endif

</div>
