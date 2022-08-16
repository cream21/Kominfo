<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class belanja extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kwitansi()
    {
        return $this->hasMany(kwitansi::class);
    }
}
