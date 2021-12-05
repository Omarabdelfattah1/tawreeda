<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function callback(Request $request){
        // dd($request->id);
        $user = auth()->user();
        $user->telegram_id = $request->id;
        $user->save();
        // dd($user->toArray());
        return redirect()->back();
    }
}
