<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kwitansi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kadis()
    {
        return $this->belongsTo(pejabat::class,"kadis_id");
    }
    public function bendahara()
    {
        return $this->belongsTo(pejabat::class,"bendahara_id");
    }
    public function pa_pptk()
    {
        return $this->belongsTo(pejabat::class,"pa_pptk_id");
    }

    public function belanja()
    {
        return $this->belongsTo(belanja::class);
    }

    public function subkegiatan()
    {
        return $this->belongsTo(subkegiatan::class);
    }
}
