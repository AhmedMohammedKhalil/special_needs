<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{
    use HasFactory;
    protected $guard = 'professor';

    protected $fillable = [
        'name', 'email','phone','gender','password','image','college_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function college()
    {
        return $this->belongsTo(College::class,'college_id');
    }
    public function meetings()
    {
        return $this->hasMany(Interview::class);
    }

}
