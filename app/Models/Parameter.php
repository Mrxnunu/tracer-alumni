<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function topik()
    {
        return $this->belongsTo(Topik::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'priode_id');
    }
}
