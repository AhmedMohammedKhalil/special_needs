<?php

namespace App\Http\Livewire\Professor\Request;

use Livewire\Component;
use App\Models\Interview;
use App\Models\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Accept extends Component
{

    public $request, $content,$date,$today,$acceptable,$professor,$student_id;

    public function mount($request_id)
    {
        $this->request = Request::whereId($request_id)->first();
        $this->professor=auth('professor')->user();
        $this->student_id=$this->request->student_id;
        $this->today = Carbon::today();
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

    public function add()
    {

        $validatedata = $this->validate(
            array_merge($this->rules,
                ['date' => ['required','after_or_equal:'.date('Y-m-d h:i:s')]]
            )
        );
        $this->acceptable = 'تمت الموافقة';
        $this->professor->students()->attach($this->student_id,$validatedata);
        $this->request->update(['acceptable'=> $this->acceptable]);

        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('professor.profile',['tab' => 'interviews']);
    }


    public function render()
    {
        return view('livewire.professor.request.accept');
    }
}
