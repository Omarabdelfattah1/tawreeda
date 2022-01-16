<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Supplier;
use DB;
class DepartmentController extends Controller
{
    public function departments()
    {
        return view('departments')->with('departments',Department::all());
    }
    public function categories(Department $department)
    {
        return view('categories')->with('categories',$department->categories);
    }

    public function get_categories($id)
    {
        $department = Department::find($id);
        return response()->json($department->categories->toArray());
    }

    public function get_multi_categories($ids)
    {
        $categories = Category::whereIn('department_id',$ids)->get();
        return response()->json($categories->toArray());
    }

    public function get_tagproducts($id)
    {
        $category = Category::find($id);
        return response()->json($category->tagproducts->toArray());
    }

    public function suppliers(Category $category,Request $request)
    {
        return view('suppliers')
            ->with('category_id',$category->id)
            ->with('categories',$category->department->categories);
    }

    public function supplier(Supplier $supplier)
    {

        return view('supplier')
        ->with('supplier' , $supplier);
    }
}
