<?php

namespace App\Http\Livewire\Student\Interview;

use Livewire\Component;
use App\Models\Interview;

class AddReject extends Component
{

    public $interview, $review,$status;

    public function mount($interview_id)
    {
        $this->interview = Interview::whereId($interview_id)->first();

    }
    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max'=>'لابد ان تكون المحتوى اصغر من 1000 كلمة'
    ];

    protected $rules = [
        'review' => ['required', 'max:1000'],
    ];

    public function edit()
    {
        $validatedata = $this->validate();
        $this->status = 'تم الرفض';
        $this->interview->update(array_merge($validatedata, ['status'=> $this->status]));

        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('student.profile',['tab' => 'interviews']);
    }


    public function render()
    {
        return view('livewire.student.interview.add-reject');
    }
}
