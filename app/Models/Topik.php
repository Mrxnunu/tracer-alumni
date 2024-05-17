<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }
}
