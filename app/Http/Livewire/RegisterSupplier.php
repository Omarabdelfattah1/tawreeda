<?php

namespace App\Http\Livewire;

use DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\Tagproduct;
use App\Models\Department;
use App\Models\Supplier;
use Livewire\WithFileUploads;

class RegisterSupplier extends Component
{
    use WithFileUploads;
    public $currentPage = 1;
    public $success = false;
    public $feilds = [
            'company_name' => '',
            'state' => '',
            'company_address' => '',
            'about' => '',
            'company_CRN' => '',
            'employees_number' => 1,
            'company_TXCard' => '',
            'cataloge' => '',
            'name' => '',
            'photo' => '',
            'email' => '',
            'mobile' => '',
            'password' => ''
        ];
    public $pages = 2;
    private $validationRules = [
        1 => [
            'feilds.company_name' => ['required', 'min:3'],
            'feilds.state' => ['required'],
            'feilds.company_address' => ['required'],
            'feilds.about' => ['required']
        ],
        2 => [
            'feilds.name' => ['required', 'string', 'max:255'],
            'feilds.mobile' => ['required','string', 'max:255', 'unique:users,mobile'],
            'feilds.email' => ['nullable','string', 'max:255', 'unique:users,email'],
            'feilds.password' => ['required', 'string', 'min:8','confirmed'],
            'feilds.password_confirmation' => ['required'],
        ],
    ];

    protected $messages = [
        'string' => 'يجب أن يكون نصاً',
        'required' => 'هذا الحقل مطلوب',
        'unique' => 'هناك حساب أخر لديه هذه البيانات',
        'min'=> 'يجب أن يكون هذا الحقل :min أحرف أو أكثر',
        'confirmed' => 'كلمتي السر غير متطابقتين',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {

        $this->validate($this->validationRules[1]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }

    public function submit()
    {
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);
        $data = $this->feilds;
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
        $this->reset();
        $this->resetValidation();
        return redirect()->to('/register-supplier');

    }
    public function render()
    {
        return view('livewire.register-supplier')
        ->with('tagproducts',Tagproduct::all())
        ->with('categories',Category::all())
        ->with('department',Department::all());
    }
}
