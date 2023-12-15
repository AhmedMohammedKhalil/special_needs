<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $types, $name,$civil_number, $email, $password,$gender,$disability_type,$status, $confirm_password, $phone, $address;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'email'   => 'required|email|unique:students,email',
        'password' => ['required', 'string', 'min:8'],
        'civil_number'   => 'required|unique:students,civil_number|max:12|min:12|regex:/^([0-9\s\-\+\(\)]*)$/',
        'confirm_password' => ['required', 'string', 'min:8','same:password'],
        'gender' => ['required'],
        'disability_type' => ['required','gt:0'],
        'address' => ['required', 'string', 'max:255'],
        'status' => ['required', 'string', 'max:255'],

    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا البريد الإلكترونى غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'email.unique' => 'هذا البريد الإلكترونى مسجل فى الموقع',
        'same' => 'لابد ان يكون كلمة السر متطابق',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
        'gt' => 'لابد ان تختار نوع الإعاقة',
        'civil_number.unique' => 'هذا الرقم المدنى مسجل فى الموقع',
        'civil_number.max' => 'لابد ان يكون الرقم المدنى 12 رقم',
        'civil_number.min' => 'لابد ان يكون الرقم المدنى 12 رقم'
    ];


    public function register(){

        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            [
                'password' => Hash::make($this->password),
                'disability_type' => $this->types[$this->disability_type - 1]
            ]
        );
        Student::Create($data);
        if(Auth::guard('student')->attempt(['email'=>$this->email,'password'=>$this->password])){
            session()->flash('message', "تم دخولك ينجاح");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'هناك خطا فى البريد الإلكترونى او كلمة المرور');
        }
    }

    public function render()
    {
        $this->types = [
            "الإعاقة البصرية",
            "الإعاقة السمعية",
            "الإعاقة العقلية",
            "الإعاقة الجسمية والحركية",
            "اضطرابات النطق والكلام",
            "الاضطرابات السلوكية والانفعالية",
            "التوحد",
            "الإعاقات التي تتطلب رعاية خاصة",
            "اعاقات اخرى"
        ];
        return view('livewire.student.register');
    }
}
