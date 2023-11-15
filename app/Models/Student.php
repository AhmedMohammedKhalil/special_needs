<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;
    protected $guard = 'student';

    protected $fillable = [
        'name', 'email','phone','status','disability_type','address','password','image','gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function colleges()
    {
        return $this->belongsToMany(College::class,'requests','$student_id','$colleg_id')
        ->using(Request::class)->withTimestamps();
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class,'interviews','$student_id','$professor_id')
        ->using(Interview::class)->withTimestamps();
    }

    public function assistant () {
        return $this->hasOne(Assistant::class);
    }
}
