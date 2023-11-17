<?php

namespace App\Http\Livewire;

use App\Models\College;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $initalcolleges;
    public $colleges;
    public function mount($colleges) {
        $this->initalcolleges = $colleges;
    }

    public function search() {
        if($this->search == '')
            $this->colleges = College::all();
        else {
                $colleges = College::where('name','like','%'.$this->search.'%')
                                        ->orWhere('description','like','%'.$this->search.'%')
                                        ->orWhere('keywords','like','%'.$this->search.'%')->distinct()->get();
                $this->colleges = $colleges;

        }
        $this->emitTo(Colleges::class,'showColleges',$this->colleges);
    }
    public function render()
    {
        return view('livewire.search');
    }
}
