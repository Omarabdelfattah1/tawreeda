<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Supplier;

class Suppliers extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $suppliers = Supplier::query()->with('user');
        if($this->search){
            $suppliers = $suppliers->whereHas('user',function($q){
                return $q->where('name','like','%'.$this->search.'%')
                ->orWhere('mobile','like','%'.$this->search.'%')
                ->orWhere('email','like','%'.$this->search.'%');
            })->orWhere('company_name','like','%'.$this->search.'%');
        }
        return view('livewire.dashboard.suppliers')->with('suppliers',$suppliers->paginate(12));
    }
}
