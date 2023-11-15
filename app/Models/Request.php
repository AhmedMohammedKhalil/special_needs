<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Request extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'acceptable', 'review','content','file','special_needs','college_id','student_id'
    ];


    public $incrementing = true;


}
