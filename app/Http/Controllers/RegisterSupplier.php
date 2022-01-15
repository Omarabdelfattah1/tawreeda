<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Tagproduct;
class RegisterSupplier extends Controller
{
    public function index(){
        return view('auth.supplier.index',[
            'departments' => Department::all(),
            'categories' => Category::all(),
            'tagproducts' => Tagproduct::all()
        ]);
    }

}
