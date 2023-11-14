<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;
    protected $guard = 'student';

    protected $fillable = [
        'name', 'email','phone','address','password','image','gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
