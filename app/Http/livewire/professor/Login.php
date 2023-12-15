<?php

namespace App\Http\Livewire\Professor;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:admins,email',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا البريد الإلكترونى غير صحيح',
        'exists' => 'هذا البريد الإلكترونى غير مسجل فى الموقع'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('professor')->attempt($validatedData)){

            session()->flash('message', "تم دخولك ينجاح");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'هناك خطا فى الرقم المدنى او كلمة المرور');
        }
    }

    public function render()
    {
        return view('livewire.professor.login');
    }
}
