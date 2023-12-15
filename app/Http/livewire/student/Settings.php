<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    use WithFileUploads;
    public $types, $name,$civil_number,$email,$gender,$phone,$image,$status,$disability_type, $password, $confirm_password,$address, $student_id;


    public function mount()
    {
        $this->student_id = Auth::guard('student')->user()->id;
        $this->name = Auth::guard('student')->user()->name;
        $this->email = Auth::guard('student')->user()->email;
        $this->civil_number = Auth::guard('student')->user()->civil_number;
        $this->gender = Auth::guard('student')->user()->gender;
        $this->phone = Auth::guard('student')->user()->phone;
        $this->address = Auth::guard('student')->user()->address;
        $this->disability_type = Auth::guard('student')->user()->disability_type;
        $this->status = Auth::guard('student')->user()->status;


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


        $this->disability_type = array_search($this->disability_type, $this->types, true) + 1;

    }


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
    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'address' => ['required', 'max:255'],
        'status' => ['required', 'max:255'],
        'disability_type' => ['required', 'gt:0'],
        'gender' => ['required']
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }

    public function updatedPassword()
    {
        $validatedata = $this->validate(
            [
                'password' => ['min:8'],
                'confirm_password' => ['min:8', 'same:password']
            ]
        );
    }

    public function edit()
    {

        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [
                    'email'   => ['required', 'email', "unique:students,email," . $this->student_id],
                    'civil_number'   => ['required', 'min:12','max:12','regex:/^([0-9\s\-\+\(\)]*)$/', "unique:students,civil_number," . $this->student_id],
                ]
            )
        );
        $validatedata = array_merge(
            $validatedata,
            [
                'disability_type' => $this->types[$this->disability_type - 1]
            ]
        );
        if ($this->password) {
            $this->updatedPassword();
            $validatedata = array_merge(
                $validatedata,
                ['password' => Hash::make($this->password)]
            );
        }
        if (!$this->image)
            student::whereId($this->student_id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            student::whereId($this->student_id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/students/' . $this->student_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('students/' . $this->student_id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('student.profile');
    }

    public function render()
    {
        return view('livewire.student.settings');
    }
}
