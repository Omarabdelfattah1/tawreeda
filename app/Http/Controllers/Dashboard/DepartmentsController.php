<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.departments.index')->with('departments',Department::withCount('categories')->paginate(15));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'dep_img'=>'required'
        ]);
        // dd($request->file('dep_img'));
        $path = str_replace('public/','',$request->file('dep_img')->store('public/departments'));
        Department::create([
            'name'=>$request->name,
            'img' => $path
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);

        $categories = $department->categories()->withCount('tagproducts')->get();
        return view('dashboard.departments.show',['department'=>$department,'categories' => $categories]); 
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $department = Department::find($id);
        $path = $department->img;
        if($request->file('dep_img')){
            Storage::delete(asset($path));
            $path = str_replace('public/','',$request->file('dep_img')->store('public/departments'));
            
        }
        // dd($request->file('dep_img'),$department,$path);
        $department->update([
            'name'=>$request->name,
            'img' => $path
        ]);
        // dd($department);
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
        $department= Department::find($id);
        $file = $department->img;
        $department->delete();
        Storage::delete('public/'.$file);

        return redirect()->back();
    }
}
