<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.buyers.index')->with('buyers',Buyer::with('user')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable','email', 'max:255', 'unique:users'],
            'mobile' => ['required','string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction( function() use ($data,&$user,$request){
            $buyer = Buyer::create($data);
            $user = $buyer->user()->create([
                'title' => $data['title'],
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
            ]);
            if($request->file('photo')){
                $path = $request->file('photo')->store('public/users/photos');
                $user->photo = str_replace('public/','',$path);
                $user->save();
            }
            if($request->file('company_logo')){
                $path = $request->file('company_logo')->store('public/logos');
                $buyer->company_logo = str_replace('public/','',$path);
                $buyer->save();
            }
        });

        return redirect()->route('dashboard.buyers.index');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        return view('dashboard.buyers.edit')
        ->with('buyer',$buyer)
        ->with('requests',$buyer->requests()->paginate(3));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        // $request->validate([
        //     'company_name' => ['required'],
        //     'title' => ['required', 'string', 'max:255'],
        //     'summary' => ['required', 'string', 'max:255'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['nullable','email', 'max:255', 'unique:users'],
        //     'mobile' => ['required','string', 'max:255', 'unique:users'],
        // ]);
        $updates = $request->except(['_token','_method','settings','profile']);
        if($request->file('company_logo'))
        {
            $path = str_replace('public/','',$request->file('company_logo')->store('public/logos'));
            $updates['company_logo'] = $path;
        }
        if($request->file('photo'))
        {
            $path = str_replace('public/','',$request->file('photo')->store('public/photos'));
            $updates['photo'] = $path;
        }
        // dd($request);
        if($request->settings){
            $buyer->update(array_filter($updates));

        }else{
            // dd('hello');
            $buyer->user()->update(array_filter($updates));
            if($request->locked){
                $buyer->user()->update([
                    'locked'=> 1
                ]);
            }else{
                $buyer->user()->update([
                    'locked'=> 0
                ]);
            }
        }
        $buyer->save();
        return response()->json([
            'success'=> 'updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        session('message','تم حذف المستخدم بنجاح');
        return redirect()->back();
    }
}
