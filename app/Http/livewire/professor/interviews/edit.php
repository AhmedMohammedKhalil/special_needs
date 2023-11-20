<?php

namespace App\Http\Livewire\Professor\Interviews;

use Livewire\Component;
use App\Models\Interview;
use App\Models\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class Edit extends Component
{

    public $interview, $content,$date;

    public function mount($interview_id)
    {
        $this->interview = Interview::whereId($interview_id)->first();
        $this->content= $this->interview->content;
        $this->date= $this->interview->date;
    }
    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max'=>'لابد ان تكون المحتوى اصغر من 1000 كلمة'
    ];

    protected $rules = [
        'content' => ['required', 'max:1000'],
        'date' => ['required']
      //  'date' => ['required', 'date_format:Y-m-d','after_or_equal:'.date('Y-m-d')],
    ];

    public function edit()
    {
        $validatedata = $this->validate();
        $this->interview->update($validatedata);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('professor.profile',['tab' => 'interviews']);
    }


    public function render()
    {
        return view('livewire.professor.interviews.edit');
    }
}
