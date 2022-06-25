<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use App\Models\Tagproduct;
use App\Models\Request as PRequest;
use App\Models\Department;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;
class SupplierController extends Controller
{

    public function calls(){
      return view('supplier.calls');
    }
    public function reviews(){
      return view('supplier.reviews');
    }

    //settings
    public function products(){
      return view('supplier.products')
      ->with('tagproducts',Tagproduct::all())
      ->with('supplier',auth()->user()->userable);
    }
    public function store(Request $request){
      $supplier = auth()->user()->userable;
      $data = [];
      if($request->file('img'))
      {
        $path = str_replace('public/','',$request->file('img')->store('public/imgs'));
        $data = [
          'name' => $request->name,
          'img' =>$path
        ];
      }

      $supplier->products()->save(new Product($data));
      return redirect()->back();
    }
    public function updateproducts(Request $request)
    {
      // dd($request->tagproduct);
      $supplier = auth()->user()->userable;
      $supplier->tagproducts()->sync($request->tagproduct);

      return redirect()->route('supplier.products');
    }
    public function factories(){
      return view('supplier.factories')
      ->with('supplier',auth()->user()->userable);
    }
    public function updatefactories(Request $request)
    {
      // dd($request->file('quality_files'));
      $supplier = auth()->user()->userable;
      $supplier->update($request->all());
      $files = [];
      if($request->file('quality_files'))
      {
        // dd($request->file('quality_files'));
        foreach($request->file('quality_files') as $file){
          // dd($file);
          $path = str_replace('public/','',$file->store('public/quality_files'));
          $files[]=[
            'type' => 'quality',
            'fileable_type' => 'App\Models\Supplier',
            'fileable_id' => $supplier->id,
            'path' => $path
          ];
        }
      }
      if($request->file('production_files'))
      {
        foreach($request->file('production_files') as $file){
          $path = str_replace('public/','',$file->store('public/production_files'));
          $files[]=[
            'type' => 'production',
            'fileable_type' => 'App\Models\Supplier',
            'fileable_id' => $supplier->id,
            'path' => $path
          ];
        }
      }
      // dd($files);
      if(count($files))
      {
        File::insert($files);
      }
      return redirect()->route('supplier.factories');
    }
    public function settings(){
      return view('supplier.settings')
      ->with('departments',Department::all())
      ->with('categories',Category::all())
      ->with('supplier',auth()->user()->userable);
    }
    public function updateSettings(Request $request)
    {
      // dd($request);
      $supplier = auth()->user()->userable;
      $supplier->departments()->sync($request->departments);
      $supplier->categories()->sync($request->categories);
      $updates = $request->all();
      if($request->file('team_photo'))
      {
        Storage::delete('public/'.$supplier->team_photo);
        $path = str_replace('public/','',$request->file('team_photo')->store('public/teams'));
        $updates['team_photo'] = $path;
      }
      if($request->file('company_logo'))
      {
        Storage::delete('public/'.$supplier->company_logo);

        $path = str_replace('public/','',$request->file('company_logo')->store('public/logos'));
        $updates['company_logo'] = $path;
      }
      if($request->file('company_cataloge'))
      {
        Storage::delete('public/'.$supplier->company_cataloge);

        $path = str_replace('public/','',$request->file('company_cataloge')->store('public/cataloge'));
        $updates['company_cataloge'] = $path;
      }
      // dd($updates);
      if($supplier instanceof Supplier){
        $supplier->update($updates);
      }
      return redirect()->route('supplier.settings');
    }

    //profile
    public function profile(){
      return view('supplier.profile');
    }
    public function updateProfile(Request $request){
      $user = auth()->user();
      $updates = $request->all();
      if($request->file('photo'))
      {
        Storage::delete('public/'.$user->photo);
        $path = str_replace('public/','',$request->file('photo')->store('public/users/photos'));
        $updates['photo'] = $path;
      }
        if (!empty($request->password && $request->password_confirmation)){
            if($request->password != $request->password_confirmation){
                return redirect()->back()->withErrors(['password'=>'كلمتي المرور غير متطابقتين']);
            }else{
                $updates['password'] = Hash::make($request->user['password']);
            }

        }
      $user->update(array_filter($updates));
      return redirect()->back();
    }


    public function add_product(Request $request){
        $request->validate([
            'img'=>'required|image',
            'name' => 'required|string'
        ]);
        $data = [];
        if($request->file('img'))
        {
            $path = str_replace('public/','',$request->file('img')->store('public/imgs'));
            $data = [
                'name' => $request->name,
                'img' =>$path
            ];
        }

        auth()->user()->userable->products()->save(new Product($data));
        session()->flash('message','تم إضافة المنتج بنجاح');
        return redirect()->back();
    }

    public function edit_product(Request $request,Product $product){
        $request->validate([
            'img'=>'nullable|image',
            'name' => 'required|string'
        ]);
        $data = [
            'name' => $request->name,
        ];
//        dd($request->all());
        if($request->file('img'))
        {
            $path = str_replace('public/','',$request->file('img')->store('public/imgs'));
            $data['img'] = $path;
        }

        $product->update($data);
        session()->flash('message','تم تعديل المنتج بنجاح');
        return redirect()->back();
    }
    public function delete_product(Request $request,Product $product){
        $product->delete();
        session()->flash('message','تم حذف المنتج بنجاح');
        return redirect()->back();
    }
}
