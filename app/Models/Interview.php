<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'status','content','details','date','professor_id','student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
