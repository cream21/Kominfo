<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pejabat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }

    public function opd()
    {
        return $this->belongsTo(opd::class);
    }

    public function kwitansi()
    {
        return $this->hasMany(kwitansi::class);
    }
}
