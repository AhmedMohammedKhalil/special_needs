<?php

namespace App\Http\Livewire\Admin\Aboutus;

use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Editph extends Component
{
    use WithFileUploads;
    public $title, $content,$about_id,$about,$image;


    public function mount($about)
    {
        $this->about = $about;
        $this->about_id = $this->about->id;
        $this->title = $this->about->title;
        $this->content = $this->about->content;
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
            $this->about->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            $this->about->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/aboutus/');
            if (file_exists($dir)){
                File::deleteDirectories($dir);
                File::deleteDirectory($dir);
            }
                mkdir($dir);
            $this->image->storeAs('aboutus/', $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.about.index');
    }

    public function render()
    {
        return view('livewire.admin.about.editph');
    }
}
