<?php

namespace App\Http\Livewire;

use App\Models\College;
use Livewire\Component;

class Colleges extends Component
{
    public $colleges;
    public $flag = false;

    protected $listeners = [
        'showColleges',
    ];


    public function showColleges($colleges) {
        $this->flag = true;
        if($colleges) {
            $ids = [];
            foreach($colleges as $college) {
                $ids[] = $college['id'];
            }
            $this->colleges = College::find($ids);
        } else {
            $this->colleges = '';
        }

    }

    public function render()
    {
        $this->colleges = $this->flag == true ? $this->colleges : College::all();
        return view('livewire.colleges');
    }
}
