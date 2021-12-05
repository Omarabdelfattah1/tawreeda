<?php

namespace App\Http\Controllers\Dashboard;
use DB;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $roles = [
        'مدير'=>'super_admin',
        'مشرف'=>'admin'
    ];
    public function index()
    {
     return view('dashboard.users')->with('users',Admin::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $this->validate($request,[
        //     'user["name"]' => 'required',
        //     'user["password"]' => 'required',
        //     'user["mobile"]' => ['required','unique:users'],
        //     'admin["name"]' => 'required'
        // ]);
        DB::transaction(function() use ($request){
            $admin = Admin::create([
                'name'=>$request->admin['name'],
                'role'=>$this->roles[$request->admin['name']],
            ]);
            $admin->user()->save(new User([
                'name' => $request->user['name'],
                'email' => $request->user['email']??'',
                'mobile' => $request->user['mobile'],
                'password' => Hash::make($request->user['password']),
            ]));
        });
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->user()->update([
            'name'=>$request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);   
        $admin->update([
            'name'=>$request->name,
            'role'=>$this->roles[$request->name],
        ]);        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        DB::transaction(function() use ($admin){
            $admin->user()->delete();
            $admin->delete();
        });
        
        return redirect()->back();
    }
}
