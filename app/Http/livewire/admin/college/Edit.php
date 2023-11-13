<?php

namespace App\Http\Livewire\Admin\College;

use App\Models\College;
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
    public $name, $location,$details,$image,$college_id,$college;


    public function mount($college)
    {
        $this->college = $college;
        $this->college_id = $this->college->id;
        $this->location = $this->college->location;
        $this->name = $this->college->name;
        $this->details = $this->college->details;
        $this->image = $this->college->image;


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
        'location' => ['required', 'string', 'max:50'],
        'details' => ['required', 'max:255'],
        'gender' => ['required']
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }



    public function edit()
    {
        $validatedata = $this->validate();
        if (!$this->image)
            $this->college->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            $this->college->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/colleges/' . $this->college->id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('colleges/' . $this->college->id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.college.index');
    }

    public function render()
    {
        return view('livewire.admin.college.edit');
    }
}
