<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class Notifications extends Component
{

    public function markAsRead($id){
       $notification = DB::table('notifications')->where('id',$id)->update([
        'read_at' => now()
       ]);
    }
    public function render()
    {
        return view('livewire.notifications',[
            'notifications' => auth()->user()->unreadNotifications
        ]);
    }
}
