<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Tagproduct;
use Illuminate\Support\Facades\Hash;
use DB;
class RegisterSupplier extends Controller
{
    public function index(){
        return view('auth.supplier.index',[
            'departments' => Department::all(),
            'categories' => Category::all(),
            'tagproducts' => Tagproduct::all()
        ]);
    }

    public function submit(RegisterSupplierRequest $request){
        $data = $request->all();
        DB::transaction(function() use ($data,&$user){
            $userable = Supplier::create([
                'company_name' => $data['company_name'],
                'state' =>  $data['state'],
                'company_address' =>  $data['company_address'],
                'about' =>  $data['about'],
                'company_CRN' =>  $data['company_CRN'],
                'employees_number' => 1,
                'company_TXCard' =>  $data['company_TXCard'],
                'cataloge' =>  $data['cataloge'],
            ]);
            if($data['cataloge']){
                $path = $data['cataloge']->store('public/cataloge');
                $userable->company_cataloge = str_replace('public/','',$path);
                $userable->save();
            }
            $user = $userable->user()->create([
                'name' => $data['name'],
                'email' => empty($data['email']) ? null:$data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'locked' => true,
            ]);
            if($data['photo']){
                $path = $data['photo']->store('public/users/photos');
                $user->photo = str_replace('public/','',$path);
                $user->save();
            }
        });
        session()->flash('message','
        <h5 class="modal-title text-primary mx-auto">شكراً لإنضمامك لأسرة موردينا</h5>

        <div class="modal-body bg-primary rounded-lg">
        هنتواصل معاك في أقرب وقت لتأكيد تسجيلك <br>
        إستنا مننا رسالة على whatsapp
        </div>');
        return redirect()->back();
    }

}
