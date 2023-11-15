<?php

namespace App\Http\Livewire\Admin\Professor;

use App\Models\Professor;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Edit extends Component
{
    use WithFileUploads;
    public $name, $email,$gender,$phone,$image, $password, $confirm_password, $professor,$professor_id;


    public function mount($professor)
    {
        $this->professor_id = $professor->id;
        $this->name = $professor->name;
        $this->email = $professor->email;
        $this->gender = $professor->gender;
        $this->phone = $professor->phone;

    }


    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image' => 'لابد ان يكون الملف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا'
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
        return redirect()->route('admin.professor.index');
    }

    public function render()
    {
        return view('livewire.admin.professor.edit');
    }
}
