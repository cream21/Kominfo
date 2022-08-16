<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(program::class);
    }

    public function subkegiatan()
    {
        return $this->hasMany(subkegiatan::class);
    }
}
