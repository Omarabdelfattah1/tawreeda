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
        return view('auth.supplier.index');
    }

    public function submit(RegisterSupplierRequest $request){
        $data = $request->all();
//        dd($data);
        DB::transaction(function() use ($data,&$user){
            $userable = Supplier::create([
                'company_name' => $data['company_name'],
                'state' =>  $data['state'],
                'company_address' =>  $data['company_address']?? null,
                'about' =>  $data['about']??null,
                'company_CRN' =>  $data['company_CRN']?? null,
                'employees_number' => $data['employees_number']?? null,
                'company_TXCard' =>  $data['company_TXCard']??null,
            ]);
            $userable->departments()->attach($data['department_id']);
            $userable->categories()->attach($data['category_id']);
            $userable->tagproducts()->attach($data['tagproducts']);
            if(isset($data['cataloge'])){
                $path = $data['cataloge']->store('public/cataloge');
                $userable->company_cataloge = str_replace('public/','',$path);
                $userable->save();
            }
            if(isset($data['company_logo'])){
                $path = $data['company_logo']->store('public/logos');
                $userable->company_logo = str_replace('public/','',$path);
                $userable->save();
            }
            $user = $userable->user()->create([
                'name' => $data['name'],
                'email' => empty($data['email']) ? null:$data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'locked' => true,
            ]);
            if(isset($data['photo'])){
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
