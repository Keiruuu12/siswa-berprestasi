<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteriaSiswa extends Model
{
    /** @use HasFactory<\Database\Factories\BobotKriteriaSiswaFactory> */
    use HasFactory;
    protected $fillable = ['siswa_id', 'olimpiade', 'nilai_rata', 'kehadiran', 'sikap'];
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }

    public static function deleteAll()
    {
        self::truncate();
    }
}
