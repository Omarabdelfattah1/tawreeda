<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
  

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
        $path = str_replace('public/','',$request->file('dep_img')->store('public/categories'));
        
        Category::create([
            'name'=>$request->name,
            'department_id'=>$request->department_id,
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
        $category = Category::find($id);
        return view('dashboard.departments.products-show')->with('category',$category); 
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
            'name'=>'required'
        ]);
        // dd($request->file('dep_img'));
        $category = Category::find($id);
        $path = $category->img;
        if($request->file('dep_img')){
            Storage::delete(asset($path));
            $path = str_replace('public/','',$request->file('dep_img')->store('public/categories'));
            
        }
        // dd($request->file('dep_img'),$category,$path);
        $category->update([
            'name'=>$request->name,
            'img' => $path
        ]);
        // dd($category);
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
        $category= Category::find($id);
        $file = $category->img;
        $category->delete();
        Storage::delete('public/'.$file);

        return redirect()->back();
    }
}
