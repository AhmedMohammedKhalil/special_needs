<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Interview extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'status','content','details','date','professor_id','student_id'
    ];


    public $incrementing = true;



    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
    // public function professor()
    // {
    //     return $this->belongsTo(Professor::class);
    // }
}
