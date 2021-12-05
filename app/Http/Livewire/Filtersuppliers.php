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
    // public function mount(Category $category){
    //     $this->category = Category::find($category);
    //     $this->suppliers = $category->suppliers;
    //     $this->categories = $category->department->categories;
    // }
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
        // dd($this->suppliers);
        $suppliers = Category::find($this->category->id)->suppliers();
        // dd($suppliers);
        return view('livewire.filtersuppliers')
        ->with('suppliers',$suppliers->when($this->states,function($query,$states){
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