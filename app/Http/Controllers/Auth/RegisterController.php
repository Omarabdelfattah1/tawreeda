<?php

namespace App\Http\Controllers\Auth;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Tagproduct;
use App\Models\Department;
use App\Models\Supplier;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function registered(Request $request, $user)
    {
        if (!is_null(auth()->user()->userable instanceof (Buyer::class))){
            return redirect()->back();
        }
    }

    public function showBuyerRegisterationFrom(){
        return view('auth.buyer_register');
    }
    public function showSupplierRegisterationFrom(){
        return view('auth.supplier_register')
        ->with('tagproducts',Tagproduct::all())
        ->with('categories',Category::all())
        ->with('departments',Department::all());

    }
    public function showSupplierRegisteration(){
        return view('auth.test_register_supplier');

    }

    public function storeBuyer(array $data){
        return Buyer::create($data);
    }
    public function storeSupplier($data){
        return Supplier::create($data);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $to_merge =[];
        if($data['user_type'] == 'supplier'){
            $to_merge = [
                'about' => ['required'],
                'departments' => ['required'],
                'categories' => ['required'],
                'employees_number' => ['required'],
                'company_address' => ['required'],
            ];
        }
        $rules = [
            'company_name' => ['required'],
            'summary' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable','email', 'max:255', 'unique:users'],
            'mobile' => ['required','string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $rules = array_merge($to_merge,$rules);
        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User;
        // dd($data,request());
        DB::transaction(function() use ($data,&$user){
            $userable;
            if($data['user_type'] == 'buyer'){
                $userable = $this->storeBuyer($data);
                if(isset($data['company_logo'])){
                    $path = $data['company_logo']->store('public/logo');
                    $userable->company_logo = str_replace('public/','',$path);
                    $userable->save();
                }
            }

            if($data['user_type'] == 'supplier'){
                $userable = $this->storeSupplier($data);
                $userable->departments()->attach($data['department']);
                $userable->categories()->attach($data['categories']);
                if($data['cataloge']){
                    $path = $data['cataloge']->store('public/cataloge');
                    $userable->company_cataloge = str_replace('public/','',$path);
                    $userable->save();
                }
            }
            // dd($userable);
            $user = $userable->user()->create([
                'title' => $data['title'],
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
            ]);
            if(isset($data['photo'])){
                $path = $data['photo']->store('public/users/photos');
                $user->photo = str_replace('public/','',$path);
                $user->save();
            }



        });


        return $user;
    }
}
