<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeringkatSaw extends Model
{
    protected $fillable = ['siswa_id', 'nilaiSaw'];

    public static function deleteAll()
    {
        self::truncate();
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }
}
