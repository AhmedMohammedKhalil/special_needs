<?php

namespace App\Http\Livewire\Student;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $civil_number;
    public $password;

    protected $rules = [
        'civil_number'   => 'required|exists:students,civil_number|max:12|min:12',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'password.min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'exists' => 'هذا الرقم المدنى غير مسجل فى الموقع',
        'civil_number.max' => 'لابد ان يكون الرقم المدنى 12 رقم',
        'civil_number.min' => 'لابد ان يكون الرقم المدنى 12 رقم'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('student')->attempt($validatedData)){

            session()->flash('message', "تم دخولك ينجاح");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'هناك خطا فى الرقم المدنى او كلمة المرور');
        }
    }

    public function render()
    {
        return view('livewire.student.login');
    }
}
