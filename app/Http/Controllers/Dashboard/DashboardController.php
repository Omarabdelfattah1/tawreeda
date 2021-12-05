<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Request as PRequest;
use App\Models\Supplier;
use App\Models\Buyer;
use App\Models\User;
use App\Models\Department;
use App\Models\Category;
use App\Models\Report;
class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index')
        ->with('buyers_count',Buyer::count())
        ->with('suppliers_count',Supplier::count())
        ->with('departments_count',Department::count())
        ->with('categories_count',Category::count())
        ->with('reports_count',Report::count())
        ->with('requests_count',PRequest::count())
        ->with('requests',PRequest::latest()->take(3)->get());
    }

    public function login(Request $request)
    {
        // Check validation
        $this->validate($request, [
            'mobile' => 'required',            
            'password' => 'required',            
        ]);

        // Get user record
        $user = User::where('mobile', $request->get('mobile'))->first();
        // dd($user??false,Hash::check($request->get('password'),$user->password));
        // Check Condition Mobile No. Found or Not
        if(is_null($user) || !Hash::check($request->get('password'),$user->password)) {
            $messages = [];
            $messages[]=['message'=>'البيانات غير متطابقة']; // Add the message
            // dd($messages);
            return redirect()->back()->withErrors($messages)->withInput();
        }        
        
        // Set Auth Details
        \Auth::login($user);
        
        // Redirect home page
        return redirect()->route('dashboard.home');
    }
}
