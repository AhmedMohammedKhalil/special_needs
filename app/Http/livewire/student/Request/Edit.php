<?php

namespace App\Http\Livewire\Student\Request;

use App\Models\College;
use App\Models\Request;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Edit extends Component
{

    use WithFileUploads;
    public $special_needs, $content,$file,$request;

    public function mount($request_id)
    {
        $this->request = Request::whereId($request_id)->first();
        $this->special_needs = $this->request->special_needs;
        $this->content = $this->request->content;

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

    public function edit()
    {
        $validatedata = $this->validate();
        if (!$this->file)
            $this->request->update($validatedata);
        if ($this->file) {
            $this->updatedfile();
            $filename = $this->file->getClientOriginalName();
            $this->request->update(array_merge($validatedata, ['file' => $filename]));
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
        return view('livewire.student.request.edit');
    }
}
