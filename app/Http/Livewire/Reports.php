<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;
class Reports extends Component
{
    use WithPagination;
    public $report_id;

    public function updatedReportId(){
        $this->resetPage();
    }
    public function render()
    {
        $reports = Report::query();

        if (!is_null($this->report_id)){
            $reports = $reports->where('id',$this->report_id);
        }
        return view('livewire.reports',[
            'reports' => $reports->paginate(15)
        ]);
    }
}
