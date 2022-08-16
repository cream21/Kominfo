<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatan::class);
    }

    public function kwitansi()
    {
        return $this->hasMany(kwitansi::class);
    }
}
