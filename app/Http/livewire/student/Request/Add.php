<?php

namespace App\Http\Livewire\Student\Request;

use App\Models\College;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Add extends Component
{

    use WithFileUploads;
    public $special_needs, $content,$college_id,$file,$student,$request;

    public function mount($college_id)
    {
        $this->college_id = $college_id;
        $this->student = Student::whereId(auth('student')->user()->id)->first();
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
            $this->student->colleges()->attach($this->college_id,$validatedata);
        if ($this->file) {
            $this->updatedfile();
            $filename = $this->file->getClientOriginalName();
            $this->student->colleges()->attach($this->college_id,array_merge($validatedata, ['file' => $filename]));
            $this->request = $this->student->colleges()->where('colleges.id', $this->college_id)->orderBy('pivot_created_at','desc')->first()->pivot;
            $dir = public_path('assets/images/data/requests/' . $this->request->id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->file->storeAs('requests/' . $this->request->id, $filename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }

        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('student.profile',['tab' => 'requests']);
    }
    public function render()
    {
        return view('livewire.student.request.add');
    }
}
