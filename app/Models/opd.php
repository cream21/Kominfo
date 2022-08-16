<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opd extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pejabat()
    {
        return $this->hasMany(Pejabat::class);
    }
}
