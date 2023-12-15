<?php

namespace App\Http\Livewire\Admin\galary;

use App\Models\Galary;
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
    public $image;


    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image' => 'لابد ان يكون الملف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',

    ];

   
    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }



    public function add()
    {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            $galary = Galary::create(array('image'=>$imagename));
            $dir = public_path('assets/images/data/galaries/' . $galary->id.'/');
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('galaries/' . $galary->id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.galary.index');
    }

    public function render()
    {
        return view('livewire.admin.galary.add');
    }
}
