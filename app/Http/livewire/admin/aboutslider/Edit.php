<?php

namespace App\Http\Livewire\Admin\Aboutslider;

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
    public $title, $content,$slider_id,$aboutslider;


    public function mount($aboutslider)
    {
        $this->aboutslider = $aboutslider;
        $this->slider_id = $this->aboutslider->id;
        $this->title = $this->aboutslider->title;
        $this->content = $this->aboutslider->content;
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
        'title' => ['required', 'string', 'max:50'],
        'content' => ['required', 'max:500'],
    ];

   



    public function edit()
    {
        $validatedata = $this->validate();
            $this->aboutslider->update($validatedata);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.aboutslider.index');
    }

    public function render()
    {
        return view('livewire.admin.aboutslider.edit');
    }
}
