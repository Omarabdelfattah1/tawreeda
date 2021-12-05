<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Request as PRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        // dd()
        return view('buyer.requests.index')
        ->with('requests',auth()->user()->userable->requests);
    }
    public function show(PRequest $request)
    {
        return view('buyer.requests.show')->with('request',$request);
    }
}
