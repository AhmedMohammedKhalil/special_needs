<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Request extends Pivot
{
    use HasFactory;
    public $table = "requests";
    protected $fillable = [
        'acceptable', 'review','content','file','special_needs','college_id','student_id'
    ];


    public $incrementing = true;

    public function college()
    {
        return $this->belongsTo(College::class,'college_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
