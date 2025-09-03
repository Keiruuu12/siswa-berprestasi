<?php

namespace App\Http\Controllers;

use App\Models\KriteriaSiswa;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PeringkatSaw;
use Illuminate\Http\Request;

class PeringkatSawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function sikapAngka($sikap)
    {
        $mapping = [
            'A' => 5,
            'B' => 4,
            'C' => 3,
            'D' => 2,
            'E' => 1,
        ];

        return $mapping[strtoupper($sikap)] ?? 0;
    }

    public function index()
    {
        $saws = PeringkatSaw::with('siswa')->orderByDesc('nilaiSaw')->paginate(10);
        return view('saw.index', ['saws' => $saws]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $kriteriaSiswa = KriteriaSiswa::all();
        if(count($kriteriaSiswa) < 1)
        {
            Alert::error('Gagal', "Mohon Mengisi Kriteria Siswa Terlebih Dahulu!");
            return redirect('/peringkat-saw');
        }else{
        PeringkatSaw::deleteAll();

        $olimpiade = 4;
        $nilaiRata = 3;
        $kehadiran = 2;
        $sikap     = 1;

        $totalKriteria = $olimpiade + $nilaiRata + $sikap + $kehadiran;

        // bobot kriteria yang sudah dibagi //
        $kOlimpiade = $olimpiade / $totalKriteria;
        $kNilaiRata = $nilaiRata / $totalKriteria;
        $kSikap     = $sikap     / $totalKriteria;
        $kKehadiran = $kehadiran / $totalKriteria;

        $kriteriaSiswas = KriteriaSiswa::all();

        $siswas     = [];
        $olimpiades = [];
        $nilaiRatas = [];
        $sikaps     = [];
        $kehadirans = [];

        foreach($kriteriaSiswas as $kriteriaSiswa)
        {

            if($kriteriaSiswa->sikap === 'E'){
                $sikaps[] = 1;
            }elseif($kriteriaSiswa->sikap === 'D'){
                $sikaps[] = 2;
            }elseif($kriteriaSiswa->sikap === 'C'){
                $sikaps[] = 3;
            }elseif($kriteriaSiswa->sikap === 'B'){
                $sikaps[] = 4;
            }else{
                $sikaps[] = 5;
            }

            if($kriteriaSiswa->kehadiran < 65){
                $kehadirans[] = 1;
            }elseif($kriteriaSiswa->kehadiran >= 65 && $kriteriaSiswa->kehadiran <= 75){
                $kehadirans[] = 2;
            }elseif($kriteriaSiswa->kehadiran >= 76 && $kriteriaSiswa->kehadiran <= 85){
                $kehadirans[] = 3;
            }elseif($kriteriaSiswa->kehadiran >= 86 && $kriteriaSiswa->kehadiran <= 95){
                $kehadirans[] = 4;
            }else{
                $kehadirans[] = 5;
            }

            if($kriteriaSiswa->nilai_rata < 65){
                $nilaiRatas[] = 1;
            }elseif($kriteriaSiswa->nilai_rata >= 65 && $kriteriaSiswa->nilai_rata <= 75){
                $nilaiRatas[] = 2;
            }elseif($kriteriaSiswa->nilai_rata >= 76 && $kriteriaSiswa->nilai_rata <= 85){
                $nilaiRatas[] = 3;
            }elseif($kriteriaSiswa->nilai_rata >= 86 && $kriteriaSiswa->nilai_rata <= 95){
                $nilaiRatas[] = 4;
            }else{
                $nilaiRatas[] = 5;
            }

            if($kriteriaSiswa->olimpiade === 0){
                $olimpiades[] = 1;
            }elseif($kriteriaSiswa->olimpiade === 1){
                $olimpiades[] = 2;
            }elseif($kriteriaSiswa->olimpiade === 2){
                $olimpiades[] = 3;
            }elseif($kriteriaSiswa->olimpiade === 3){
                $olimpiades[] = 4;
            }else{
                $olimpiades[] = 5;
            }
            

            $siswas[] = $kriteriaSiswa->siswa_id;

        }

        $maxSikap = max($sikaps);
        $maxOlimpiade = max($olimpiades);
        $maxNilaiRata = max($nilaiRatas);
        $maxKehadiran = max($kehadirans);

        // nilai normalisasi tiap nilai siswa
        $nSiswas = [];
        $nOlimpiades = [];
        $nNilaiRatas = [];
        $nSikaps = [];
        $nKehadirans = [];

        for($i=0; $i < count($kriteriaSiswas); $i++){
            $nSiswas[]     = $kriteriaSiswas[$i]->siswa_id;
            $nOlimpiades[] = $olimpiades[$i] / $maxOlimpiade;
            $nSikaps[]     = $sikaps[$i] / $maxSikap;
            $nKehadirans[] = $kehadirans[$i] / $maxKehadiran;
            $nNilaiRatas[] = $nilaiRatas[$i] / $maxNilaiRata;
        }
        
        // hasil untuk di peringkatkan
        $hSiswas     = [];
        $hOlimpiades = [];
        $hNilaiRatas = [];
        $hSikaps     = [];
        $hKehadirans = [];


        for($i = 0; $i < count($nSiswas); $i++)
        {
            $hSiswas[] = $kriteriaSiswas[$i]->siswa->nama;
            $hOlimpiades[] = ($kOlimpiade * $nOlimpiades[$i]);
            $hNilaiRatas[] = ($kNilaiRata * $nNilaiRatas[$i]);
            $hSikaps[] = ($kSikap * $nSikaps[$i]);
            $hKehadirans[] = ($kKehadiran * $nKehadirans[$i]);
        }


        // HASIL
        $hasilAkhir = [];

        for($i = 0; $i < count($hSiswas); $i++)
        {
            $hasilAkhir[] = $hOlimpiades[$i] + $hNilaiRatas[$i] + $hSikaps[$i] + $hKehadirans[$i];
        }


        for($i = 0; $i < count($hSiswas); $i++)
        {
            $peringkatSaw = [
            'siswa_id' => $kriteriaSiswas[$i]->siswa_id,
            'nilaiSaw' => $hasilAkhir[$i]
            ];

            
            PeringkatSaw::create($peringkatSaw);
        }
        Alert::success('Berhasil', "Berhasil Memproses Peringkat SAW");
        return redirect('/peringkat-saw');
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
    public function show(PeringkatSaw $peringkatSaw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeringkatSaw $peringkatSaw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeringkatSaw $peringkatSaw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeringkatSaw $peringkatSaw)
    {
        //
    }
}
