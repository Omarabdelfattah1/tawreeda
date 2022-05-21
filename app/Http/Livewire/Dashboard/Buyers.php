<?php

namespace App\Http\Livewire\Dashboard;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Buyer;

class Buyers extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $buyers = Buyer::query()->with('user');
        if($this->search){
            $buyers = $buyers->whereHas('user',function($q){
                return $q->where('name','like','%'.$this->search.'%')
                ->orWhere('mobile','like','%'.$this->search.'%')
                ->orWhere('email','like','%'.$this->search.'%');
            })->orWhere('company_name','like','%'.$this->search.'%');
        }
        return view('livewire.dashboard.buyers')->with('buyers',$buyers->paginate(12));
    }
}
