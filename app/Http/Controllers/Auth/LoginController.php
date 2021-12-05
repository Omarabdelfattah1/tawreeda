<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect(url()->previous());
    }

    public function username(){
        return 'email' or 'mobile';
    }
    // public function login(Request $request)
    // {
    //     // Check validation
    //     $this->validate($request, [
    //         'mobile' => 'required',            
    //     ]);

    //     // Get user record
    //     $user = User::where('mobile', $request->get('mobile'))->first();

    //     // Check Condition Mobile No. Found or Not
    //     if(is_null($user) || !Hash::check($request->get('password'),$user->password)) {
    //         $messages = [];
    //         $messages[]=['message'=>'البيانات غير متطابقة']; // Add the message
    //         // dd($messages);
    //         return redirect()->back()->withErrors($messages)->withInput();
    //     }   
    //     if($user->locked){
    //         session()->flash('message' ,'تم إيقاف حسابك');
    //         return redirect()->back();
    //     }    
        
    //     // Set Auth Details
    //     \Auth::login($user);
        
    //     // Redirect home page
    //     return back();
    // }
    
}
