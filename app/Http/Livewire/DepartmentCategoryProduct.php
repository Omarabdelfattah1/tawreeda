<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Department;
use App\Models\Tagproduct;
use Livewire\Component;

class DepartmentCategoryProduct extends Component
{
    public $departmentsIds = [];
    public $categoriesIds = [];
    public $tagProductIds= [];

    public $departments;
    public $categories;
    public $tagproducts;
    protected $listeners = [
        'getCategories' => 'getCategories',
        'getTagProducts' => 'getTagProducts',
    ];

    public function mount(){
        $this->departments = Department::get();
        $this->categories = Category::get();
        $this->tagproducts = Tagproduct::get();
    }
    public function hydrate()
    {
        $this->dispatchBrowserEvent('render_select2');
    }
    public function render()
    {
        return view('livewire.department-category-product');
    }

    public function getCategories(){
        $this->categories = Category::whereIn('department_id',$this->departmentsIds)->get();
    }
    public function getTagProducts(){
        $this->tagproducts = Tagproduct::whereIn('category_id',$this->categoriesIds)->get();
    }
}
