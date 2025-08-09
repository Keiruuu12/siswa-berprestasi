<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;
    protected $fillable= ['nama', 'nis', 'kelas'];
    public function kriteriaSiswa()
    {
        return $this->hasOne('App\Models\KriteriaSiswa');
    }

    public function peringkatSaw()
    {
        return $this->hasOne('App\Models\PeringkatSaw');
    }

    public function peringkatAhp()
    {
        return $this->hasOne('App\Models\PeringkatAhp');
    }
}
