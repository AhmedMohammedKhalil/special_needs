<?php

namespace App\Http\Livewire\Student\Assistant;

use App\Models\Assistant;
use Livewire\Component;

class Add extends Component
{

    public $name, $gender,$phone;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'gender' => ['required'],

    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',
    ];


    public function add(){

        $validatedData = $this->validate();

        Assistant::Create(array_merge($validatedData,['student_id'=>auth('student')->user()->id]));
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('student.profile',['tab' => 'assistant']);
    }

    public function render()
    {
        return view('livewire.student.assistant.add');
    }
}
