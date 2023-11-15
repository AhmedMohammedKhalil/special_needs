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

class Add extends Component
{
    use WithFileUploads;
    public $name, $location,$description,$image,$keywords;


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
        'description' => ['required', 'max:255'],
        'keywords' => ['required']
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }



    public function add()
    {
        $validatedata = $this->validate();
        if (!$this->image)
            College::create($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            $college = College::create(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/colleges/' . $college->id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('colleges/' . $college->id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.college.index');
    }

    public function render()
    {
        return view('livewire.admin.college.add');
    }
}
