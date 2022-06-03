<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingsController extends Controller
{
    public function edit(){
        return view('dashboard.settings');
    }
    public function update(Request $request){

        foreach ($request->except('_token') as $key => $value){
            if ($request->hasFile($key)){
                $value = str_replace('public/','',$value->store('public/logo'));

            }
//            dd($key,$value);

            if (!empty($value)){
                Setting::set($key,$value);
            }
        }
        return redirect()->back();
    }
}
