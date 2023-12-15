<?php

namespace App\Http\Livewire\Professor;

use App\Models\Professor;
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
    public $name,$civil_number, $email,$gender,$phone,$image, $password, $confirm_password, $professor_id;


    public function mount()
    {
        $this->professor_id = Auth::guard('professor')->user()->id;
        $this->name = Auth::guard('professor')->user()->name;
        $this->email = Auth::guard('professor')->user()->email;
        $this->civil_number = Auth::guard('professor')->user()->civil_number;
        $this->gender = Auth::guard('professor')->user()->gender;
        $this->phone = Auth::guard('professor')->user()->phone;

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
                    'email'   => ['required', 'email', "unique:professors,email," . $this->professor_id],
                    'civil_number'   => ['required', 'min:12','max:12','regex:/^([0-9\s\-\+\(\)]*)$/', "unique:professors,civil_number," . $this->professor_id],

                ]
            )
        );
        if ($this->password) {
            $this->updatedPassword();
            $validatedata = array_merge(
                $validatedata,
                ['password' => Hash::make($this->password)]
            );
        }
        if (!$this->image)
            Professor::whereId($this->professor_id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            Professor::whereId($this->professor_id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/professors/' . $this->professor_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('professors/' . $this->professor_id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('professor.profile');
    }

    public function render()
    {
        return view('livewire.professor.settings');
    }
}
