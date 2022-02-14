<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use DB;
class Filtersuppliers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category;
    public $states;
    public $review;
    public $type;
    public $verified;
     public function mount($category){
         $this->category = $category;
     }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatedStates(){
        if(!is_array($this->states)) return;
        $this->states = array_filter($this->states,function($states){
            return $states != false;
        });
    }

    public function render()
    {

        $suppliers = Category::find($this->category)->suppliers()->with('reviews');
        return view('livewire.filtersuppliers')
        ->with('suppliers',$suppliers->whereHas('user',function ($q){
            return $q->where('verified',true);
        })->when($this->states,function($query,$states){
                return $query->whereIn('state',$states);
            })->when($this->type,function($query,$type){
                return $query->where('type',$type);
            })->when($this->verified,function($query,$verified){
                return $query->where('verified',$verified);
            })->when($this->review,function($query){
                return $query->join('reviews', 'suppliers.id', '=', 'reviews.supplier_id')
                ->groupBy('suppliers.id')->havingRaw('AVG(reviews.stars) >= ?', [$this->review]);
            })->paginate(9));
    }
}
