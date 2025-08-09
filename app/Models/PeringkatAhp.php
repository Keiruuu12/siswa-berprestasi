<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeringkatAhp extends Model
{
    protected $fillable =['siswa_id', 'nilaiAhp', 'sikap', 'kehadiran', 'nilai_rata', 'olimpiade'];


    public static function deleteAll()
    {
        self::truncate();
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }
}
