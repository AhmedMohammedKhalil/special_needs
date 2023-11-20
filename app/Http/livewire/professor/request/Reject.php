<?php

namespace App\Http\Livewire\Professor\Request;

use Livewire\Component;
use App\Models\Interview;
use App\Models\Request;

class Reject extends Component
{

    public $request, $review,$acceptable;

    public function mount($request_id)
    {
        $this->request = Request::whereId($request_id)->first();
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
        $this->acceptable = 'تم الرفض';
        $this->request->update(array_merge($validatedata, ['acceptable'=> $this->acceptable]));

        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('professor.profile',['tab' => 'requests']);
    }


    public function render()
    {
        return view('livewire.professor.request.reject');
    }
}
