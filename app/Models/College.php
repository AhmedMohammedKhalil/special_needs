<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{

    use HasFactory;

    protected $fillable = [
        'name', 'location','description','image','keywords',
    ];

    public function professors()
    {
        return $this->hasMany(Professor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'requests','$college_id','$student_id')
        ->using(Request::class)->withTimestamps();
    }

}
