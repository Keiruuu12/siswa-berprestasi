<?php

namespace App\Http\Controllers;

use App\Models\BobotKriteriaSiswa;
use App\Models\KriteriaSiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Siswa;

class BobotKriteriaSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function konversiRata($nilaiRata)
    {
        if($nilaiRata > 95) {
            return 5;
        } elseif ($nilaiRata >= 86 && $nilaiRata <= 95){
            return 4;
        } elseif ($nilaiRata >= 76 && $nilaiRata <= 85){
            return 3; 
        } elseif ($nilaiRata >= 65 && $nilaiRata <= 75){
            return 2;
        }else{
            return 1;
        }
    }

    function konversiOlimpiade($nilaiOlimpiade)
    {
        if($nilaiOlimpiade > 3) {
            return 5;
        } elseif ($nilaiOlimpiade === 3) {
            return 4;
        } elseif ($nilaiOlimpiade === 2) {
            return 3;
        } elseif ($nilaiOlimpiade === 1) {
            return 2;
        } else {
            return 1;
        }
    }

    function konversiKehadiran($nilaiKehadiran)
    {
        if($nilaiKehadiran > 95) {
            return 5;
        } elseif ($nilaiKehadiran >= 86 && $nilaiKehadiran <= 95){
            return 4;
        } elseif ($nilaiKehadiran >= 76 && $nilaiKehadiran <= 85){
            return 3; 
        } elseif ($nilaiKehadiran >= 65 && $nilaiKehadiran <= 75){
            return 2;
        }else{
            return 1;
        }
    }

    function konversiSikap($nilaiSikap)
    {
        if ($nilaiSikap === 'A') {
            return 5;
        } elseif ($nilaiSikap === 'B') {
            return 4;
        } elseif ($nilaiSikap === 'C') {
            return 3;
        } elseif ($nilaiSikap === 'D') {
            return 2;
        } elseif ($nilaiSikap === 'E') {
            return 1;
        }
    }

    public function index()
    {
        $bobotKriteriaSiswas = BobotKriteriaSiswa::with('siswa')->paginate(10);
        return view('bobot-siswa.index', ['bobotKriteriaSiswas' => $bobotKriteriaSiswas]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $kriteriaSiswa = KriteriaSiswa::all();
        if(count($kriteriaSiswa) < 1){
            Alert::error('Gagal', "Mohon Mengisi Kriteria Siswa Terlebih Dahulu!");
            return redirect('/bobot-siswa');
        }else{
            $kriteriaSiswas = KriteriaSiswa::all();
    
            BobotKriteriaSiswa::deleteAll();
    
            foreach($kriteriaSiswas as $kriteriaSiswa){
                $siswa_id = $kriteriaSiswa->siswa_id;
                $nilaiRata = $this->konversiRata($kriteriaSiswa->nilai_rata);
                $nilaiOlimpiade = $this->konversiOlimpiade($kriteriaSiswa->olimpiade);
                $nilaiKehadiran = $this->konversiKehadiran($kriteriaSiswa->kehadiran);
                $nilaiSikap = $this->konversiSikap($kriteriaSiswa->sikap);
                
                BobotKriteriaSiswa::create([
                    'siswa_id'  => $siswa_id,
                    'olimpiade' => $nilaiOlimpiade,
                    'nilai_rata'=> $nilaiRata,
                    'kehadiran' => $nilaiKehadiran,
                    'sikap'     => $nilaiSikap
                ]);
    
            }
                Alert::success('Berhasil', "Berhasil Memproses Bobot Siswa");
                return redirect('/bobot-siswa');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BobotKriteriaSiswa $bobotKriteriaSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BobotKriteriaSiswa $bobotKriteriaSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BobotKriteriaSiswa $bobotKriteriaSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BobotKriteriaSiswa $bobotKriteriaSiswa)
    {
        //
    }
}
