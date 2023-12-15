<?php

namespace App\Http\Livewire\Admin\Aboutslider;

use App\Models\AboutSlider;
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
    public $title, $content;


    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image' => 'لابد ان يكون الملف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',

    ];

    protected $rules = [
        'titl' => ['required', 'string', 'max:50'],
        'content' => ['required', 'max:500'],
    ];




    public function add()
    {
        $validatedata = $this->validate();
        if (!$this->image)
            AboutSlider::create($validatedata);
    
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.aboutslider.index');
    }

    public function render()
    {
        return view('livewire.admin.aboutslider.add');
    }
}
