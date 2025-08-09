<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaSiswa extends Model
{
    /** @use HasFactory<\Database\Factories\KriteriaSiswaFactory> */
    use HasFactory;
    protected $fillable = ['olimpiade', 'kehadiran', 'sikap', 'nilai_rata', 'siswa_id'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }

}
