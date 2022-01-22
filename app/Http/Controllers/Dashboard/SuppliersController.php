<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\Tagproduct;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\Hash;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $data = $request->all();
        DB::transaction(function() use ($data,&$user){
            $userable;

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
            if($data['photo']){
                $path = $data['photo']->store('public/users/photos');
                $user->photo = str_replace('public/','',$path);
                $user->save();
            }



        });
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.suppliers.edit')
        ->with('supplier',$supplier)
        ->with('departments',Department::all())
        ->with('tagproducts',Tagproduct::all())
        ->with('categories',Category::all())
        ->with('requests',$supplier->offers()->paginate(3));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // dd($request->all());
        if($request->settings){
            $files = [];

            $supplier->update($request->except(['_token','_method','settings']));
            if($request->verified){
                $supplier->verified =1;
                $supplier->save();
            }else{
                $supplier->verified =0;
                $supplier->save();
            }
            // departments , tags and categories
            $supplier->departments()->sync($request->departments);
            $supplier->categories()->sync($request->categories);
            $supplier->tagproducts()->sync($request->tagproducts);

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

            if($request->file('company_logo')){
                $path = $request->company_logo->store('public/logos');
                $supplier->company_logo = str_replace('public/','',$path);
                $supplier->save();
            }
            // dd($files);
            if(count($files))
            {
                File::insert($files);
            }
        }else{
            $status = $this->updateProfile($supplier->user(),$request);
            dd($status);
        }
        session()->flash('message','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function updateProfile($user,$request){
        $updates = $request->except(['_token','_method','profile','password','password_confirmation']);
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
                $updates['password'] = Hash::make($request->password);
            }

        }
        if($request->locked){
            $updates['locked']= true;
        }else{
            $updates['locked']= true;
        }
         return $user->update(array_filter($updates));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->user()->delete();
        $supplier->offers()->delete();
        $supplier->delete();
        return redirect()->back();
    }
}
