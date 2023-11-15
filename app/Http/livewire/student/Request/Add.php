<?php

namespace App\Http\Livewire\Student\Request;

use App\Models\College;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


class Add extends Component
{

    use WithFileUploads;
    public $special_needs, $content,$college_id,$file;

    public function mount($college_id)
    {
        $this->college_id = $this->college->id;
    }
    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'mimes' => 'لابد ان يكون الملف pdf',
        'file.max' => 'يجب ان يكون الفايل اصغر من 100 ميجا',
        'max'=>'لابد ان تكون المحتوى اصغر من 1000 كلمة'
    ];

    protected $rules = [
        'content' => ['required', 'max:1000'],
        'special_needs' => ['required','max:1000']
    ];

    public function updatedFile()
    {
        $validatedata = $this->validate(
            ['file' => ['file', 'mimes:pdf', 'max:102400']]
        );
    }



    public function add()
    {
        $validatedata = $this->validate();
        if (!$this->file)

        if ($this->file) {
            $this->updatedfile();
            $filename = $this->file->getClientOriginalName();
            $college = College::create(array_merge($validatedata, ['file' => $filename]));
            $dir = public_path('assets/files/data/colleges/' . $college->id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->file->storeAs('colleges/' . $college->id, $filename);
            File::deleteDirectory(public_path('assets/files/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.college.index');
    }
    public function render()
    {
        return view('livewire.student.request.add');
    }
}
