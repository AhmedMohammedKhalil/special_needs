<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{

    use HasFactory;

    protected $fillable = [
        'name', 'location','description','image',
    ];

    public function professors()
    {
        return $this->hasMany(Professor::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
