<?php

namespace App\Http\Livewire\Student\Assistant;

use Livewire\Component;
use App\Models\Assistant;

class Edit extends Component
{

    public $name, $gender,$phone,$assistant;

    public function mount($assistant_id) {
        $this->assistant = Assistant::whereId($assistant_id)->first();
        $this->name = $this->assistant->name;
        $this->gender = $this->assistant->gender;
        $this->phone = $this->assistant->phone;

    }
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


    public function edit(){

        $validatedData = $this->validate();
        $this->assistant->update($validatedData);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('student.profile',['tab' => 'assistant']);
    }
    public function render()
    {
        return view('livewire.student.assistant.edit');
    }
}
