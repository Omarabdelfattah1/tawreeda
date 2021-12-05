<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Request as PRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use DB;

class RequestController extends Controller
{
    public function index(){
        $requests = auth()->user()->userable->requests->unique();
        // dd($requests);
        // $requests = PRequest::with('tagproducts')->whereIn('tagproduct_id',$tagIds)->paginate(5);
        return view('supplier.requests.index')->with('requests',$requests);
    }
    public function show(PRequest $request)
    {
        return view('supplier.requests.show')->with('request',$request);
    }
}
