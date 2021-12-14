<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\Tagproduct;
use App\Models\Department;
use App\Models\Supplier;
class RegisterSupplier extends Component
{
    public $currentPage = 1;
    public $success;

    // Form feilds
    public $feilds = [
        'supplier' => [
            'company_name' => '',
            'state' => '',
            'company_address' => '',
            'about' => '',
            'department' => [],
            'categories' => [],
            'company_CRN' => '',
            'employees_number' => 1,
            'company_TXCard' => '',
            'cataloge' => '',
        ],
        'user' => [
            'name' => '',
            'email' => '',
            'phone' => '',
            'password' => ''
        ]
    ];
    public $pages = 2;
    private $validationRules = [
        1 => [
            'feilds.supplier.company_name' => ['required', 'min:3'],
            'feilds.supplier.state' => ['required'],
            'feilds.supplier.company_address' => ['required'],
            'feilds.supplier.about' => ['required'],
            'feilds.supplier.department' => ['required'],
            'feilds.supplier.categories' => ['required'],
        ],
        2 => [
            'feilds.user.password' => ['required', 'string', 'min:8'],
            'feilds.user.confirmPassword' => ['required', 'string', 'same:password', 'min:8'],
        ],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }

    public function resetSuccess()
    {
        $this->reset('success');
    }

    public function submit()
    {
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        User::create([
            'name' => "{$this->firstName} {$this->lastName}",
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->reset();
        $this->resetValidation();

        $this->success = 'User created successfully!';
    }
    public function render()
    {
        return view('livewire.register-supplier')
        ->with('tagproducts',Tagproduct::all())
        ->with('categories',Category::all())
        ->with('department',Department::all());
    }
}
