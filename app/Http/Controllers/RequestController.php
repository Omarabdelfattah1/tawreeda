<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Request as PRequest;
use App\Models\File;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Department;
use App\Models\Tagproducts;
class RequestController extends Controller
{
    public function create(){
        return view('create_request')
        ->with('categories',Category::all())
        ->with('departments',Department::all());
    }

    public function store(Request $request)
    {

        $user = new User;
        $data = $request->validate([
            'tagproducts'=>'required|array',
            'description' =>'required'
        ]);
        if(!auth()->check()){

            if($request->mobile_login && $request->password_login){
                $user = User::where('mobile', $request->get('mobile_login'))->first();
                // Check Condition Mobile No. Found or Not
                if(is_null($user) || !Hash::check($request->get('password_login'),$user->password)) {
                    $messages = [];
                    $messages[]=['message'=>'البيانات غير متطابقة']; // Add the message
                    // dd($messages);
                    return redirect()->back()->withErrors($messages)->withInput();
                }
                if(!($user->userable instanceof (Buyer::class))){
                    session()->flash('message','هذا الحساب غير مسجل كبائع');
                    return redirect()->route('home');
                }
            }else if($request->password_register){
                $request->validate([
                    'mobile' => ['required','string', 'max:255', 'unique:users',
                    'password_register' => ['required','min:8','confirmed']
                    ]]);

                DB::transaction(function() use ($data,&$user,$request){
                    $userable = Buyer::create($request->all());

                    $user = $userable->user()->create([
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password_register),
                    ]);

                });
            }
            \Auth::login($user);
            // dd($user);

        }else{
            if(!auth()->user()->userable instanceof \App\Models\Buyer){
                session()->flash('message','عذراً لا يمكنك القيام بهذا الطلب');
                return redirect()->back();
            }
            $user = auth()->user();
        }



        $files =[];
        $data = array_merge($data,['buyer_id' => $user->userable->id]);
        $p_request = PRequest::create($data);
        $p_request->tagproducts()->sync($request->tagproducts);
        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $file){
                $path = str_replace('public/','',$file->store('public/requests'));
                $files[] =[
                    'type'=>'attachment',
                    'path' => $path,
                    'fileable_type'=> 'App\Models\Request',
                    'fileable_id' => $p_request->id,
                ];
            }
            // dd($files);
            File::insert($files);

        }

        return redirect()->route('buyer.requests.index');
        // dd($request);
    }
}
