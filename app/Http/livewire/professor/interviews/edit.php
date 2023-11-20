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
        'max'=>'لابد ان تكون المحتوى اصغر من 1000 كلمة',
        "after_or_equal" => 'لابد ان يكون التاريخ والوقت الان او بعد حين'
    ];

    protected $rules = [
        'content' => ['required', 'max:1000'],
        'date' => ['required'],
    ];


    public function edit()
    {

        $validatedata = $this->validate(
            array_merge($this->rules,
                ['date' => ['required','after_or_equal:'.date('Y-m-d h:i:s')]]
            )
        );
        $this->interview->update($validatedata);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('professor.profile',['tab' => 'interviews']);
    }


    public function render()
    {
        return view('livewire.professor.interviews.edit');
    }
}
