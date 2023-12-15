<?php

namespace App\Http\Livewire\Admin\Video;

use App\Models\Slider;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;

    public $title, $content, $video,$vid;

    public function mount($video_id)
    {
        $this->vid = Video::find($video_id);
        $this->title = $this->vid->title;
        $this->content = $this->vid->content;
    }
    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
        'image' => 'لابد ان يكون الملف صورة',
        'image.mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'video.mimes' => 'لابد ان يكون الفيديو mp4,mkv,flv',
        'video.max' => 'يجب ان تكون الفيديو اصغر من 100 ميجا',

    ];

    protected $rules = [
        'title' => ['required', 'max:255'],
        'content' => ['required', 'max:500'],
    ];

 

    public function updatedVideo()
    {
        $validatedata = $this->validate(
            ['video' => ['mimes:mp4,mkv,flv', 'max:200400']]
        );
    }

    public function edit()
    {
        $validatedData = $this->validate();
        if($this->video) {
            $this->updatedVideo();
            $videoname = $this->video->getClientOriginalName();
            $this->vid->update(array_merge($validatedData,['video'=>$videoname]));
            $path = '/video';
            $dir = public_path('assets/images/data'.$path);
            if(file_exists($dir)) {
                File::deleteDirectories($dir);
                File::deleteDirectory($dir);
            }
            mkdir($dir);
            $this->video->storeAs($path,$videoname);
        }
        else{
            $this->vid->update($validatedData);
        }
        File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('admin.video.index');
    }

    public function render()
    {
        return view('livewire.admin.video.edit');
    }
}