<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Login extends Component
{


    public $civil_number;
    public $password;

    protected $rules = [
        'civil_number'   => 'required|exists:admins,civil_number|max:12|min:12',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'password.min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'exists' => 'هذا الرقم المدنى غير مسجل فى الموقع',
        'civil_number.max' => 'لابد ان يكون الرقم المدنى 12 رقم',
        'civil_number.min' => 'لابد ان يكون الرقم المدنى 12 رقم'
    ];

    public function login()
    {
        $validatedData = $this->validate();
        if (Auth::guard('admin')->attempt($validatedData)) {

            session()->flash('message', "تم تسجيل الدخول بنجاح");
            return redirect()->route('home');
        } else {
            session()->flash('error', 'الرقم المدنى او كلمة السر غير صحيح');
        }
    }
    public function render()
    {
        return view('livewire.admin.login');
    }
}
