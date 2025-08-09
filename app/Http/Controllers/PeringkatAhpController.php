<?php

namespace App\Http\Controllers;

use App\Models\KriteriaSiswa;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PeringkatAhp;
use Illuminate\Http\Request;

class PeringkatAhpController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function subKriteria($matrix)
    {
        // Total matrix perbandingan kriteria
        $tmpIntensitas1 = [];
        $tmpIntensitas2 = [];
        $tmpIntensitas3 = [];
        $tmpIntensitas4 = [];
        $tmpIntensitas5 = [];

        for ($i = 0; $i < count($matrix); $i++) {
            $tmpIntensitas1[] = $matrix[$i][0];
            $tmpIntensitas2[] = $matrix[$i][1];
            $tmpIntensitas3[] = $matrix[$i][2];
            $tmpIntensitas4[] = $matrix[$i][3];
            $tmpIntensitas5[] = $matrix[$i][4];
        }

    
        //Total dari tiap kolom perbandingan kriteria
        $tpIntensitas1 = array_sum($tmpIntensitas1);
        $tpIntensitas2 = array_sum($tmpIntensitas2);
        $tpIntensitas3 = array_sum($tmpIntensitas3);
        $tpIntensitas4 = array_sum($tmpIntensitas4);
        $tpIntensitas5 = array_sum($tmpIntensitas5);

        //Membagi tiap kolom perbandingan kriteria dengan totalnya
        $mnKolom1 = [];
        $mnKolom2 = [];
        $mnKolom3 = [];
        $mnKolom4 = [];
        $mnKolom5 = [];

        //memasukkan nilai matrix baru ke tiap kolom matrix
        for ($i = 0; $i < count($matrix); $i++) {
            $mnKolom1[] = $matrix[$i][0] / $tpIntensitas1;
            $mnKolom2[] = $matrix[$i][1] / $tpIntensitas2;
            $mnKolom3[] = $matrix[$i][2] / $tpIntensitas3;
            $mnKolom4[] = $matrix[$i][3] / $tpIntensitas4;
            $mnKolom5[] = $matrix[$i][4] / $tpIntensitas5;
        }


        // Membuat kolom prioritas vektor dengan menjumlahkan tiap baris kriteria
        $matrixNilaiKriteria = [];

        for ($i = 0; $i < count($matrix); $i++) {
            $matrixNilaiKriteria[$i][0] = $mnKolom1[$i];
            $matrixNilaiKriteria[$i][1] = $mnKolom2[$i];
            $matrixNilaiKriteria[$i][2] = $mnKolom3[$i];
            $matrixNilaiKriteria[$i][3] = $mnKolom4[$i];
            $matrixNilaiKriteria[$i][4] = $mnKolom5[$i];
        }

        // Jumlah Kolom sub Kriteria yang sudah dibagikan (Prioritas Vektor)
        $priVektor1 = array_sum($matrixNilaiKriteria[0]);
        $priVektor2 = array_sum($matrixNilaiKriteria[1]);
        $priVektor3 = array_sum($matrixNilaiKriteria[2]);
        $priVektor4 = array_sum($matrixNilaiKriteria[3]);
        $priVektor5 = array_sum($matrixNilaiKriteria[4]);

        // Membuat kolom prioritas pada setiap kriteria dengan membagikan prioritas vektor dengan jumlah kriteria yang dipilih
        $pri1 = $priVektor1 / count($matrix);
        $pri2 = $priVektor2 / count($matrix);
        $pri3 = $priVektor3 / count($matrix);
        $pri4 = $priVektor4 / count($matrix);
        $pri5 = $priVektor5 / count($matrix);

        // Menghitung jumlah dari maks lamda atau eigen value setiap kriteria
        $eigenValue1 = $pri1 * $tpIntensitas1;
        $eigenValue2 = $pri2 * $tpIntensitas2;
        $eigenValue3 = $pri3 * $tpIntensitas3;
        $eigenValue4 = $pri4 * $tpIntensitas4;
        $eigenValue5 = $pri5 * $tpIntensitas5;
        
        //Mencari Nilai Konsisten Atau Tidak
        $totalEigenValue = $eigenValue1 + $eigenValue2 + $eigenValue3 + $eigenValue4 + $eigenValue5;

        //Mencari Nilai Konsisten Atau Tidak
        $CI = ($totalEigenValue - count($matrix)) / (count($matrix) - 1);
        $RI = 1.12;
        $CR = $CI / $RI;

        $subTemp = $CR;

        return [$subTemp, $CR, $pri1, $pri2, $pri3, $pri4, $pri5];
    }

    function kriteria($matrix)
    {
        // Total matrix perbandingan kriteria
        $tmpIntensitas1 = [];
        $tmpIntensitas2 = [];
        $tmpIntensitas3 = [];
        $tmpIntensitas4 = [];

        for ($i = 0; $i < count($matrix); $i++) {
            $tmpIntensitas1[] = $matrix[$i][0];
            $tmpIntensitas2[] = $matrix[$i][1];
            $tmpIntensitas3[] = $matrix[$i][2];
            $tmpIntensitas4[] = $matrix[$i][3];
        }

        //Total dari tiap kolom perbandingan kriteria
        $tpIntensitas1 = array_sum($tmpIntensitas1);
        $tpIntensitas2 = array_sum($tmpIntensitas2);
        $tpIntensitas3 = array_sum($tmpIntensitas3);
        $tpIntensitas4 = array_sum($tmpIntensitas4);

        //Membagi tiap kolom perbandingan kriteria dengan totalnya
        $mnKolom1 = [];
        $mnKolom2 = [];
        $mnKolom3 = [];
        $mnKolom4 = [];

        for ($i = 0; $i < count($matrix); $i++) {
            $mnKolom1[] = $matrix[$i][0] / $tpIntensitas1;
            $mnKolom2[] = $matrix[$i][1] / $tpIntensitas2;
            $mnKolom3[] = $matrix[$i][2] / $tpIntensitas3;
            $mnKolom4[] = $matrix[$i][3] / $tpIntensitas4;

        }

        // Membuat kolom prioritas vektor dengan menjumlahkan tiap baris kriteria
        $matrixNilaiKriteria = [];

        for ($i = 0; $i < count($matrix); $i++) {
            $matrixNilaiKriteria[$i][0] = $mnKolom1[$i];
            $matrixNilaiKriteria[$i][1] = $mnKolom2[$i];
            $matrixNilaiKriteria[$i][2] = $mnKolom3[$i];
            $matrixNilaiKriteria[$i][3] = $mnKolom4[$i];
        }

        $priVektor1 = array_sum($matrixNilaiKriteria[0]);
        $priVektor2 = array_sum($matrixNilaiKriteria[1]);
        $priVektor3 = array_sum($matrixNilaiKriteria[2]);
        $priVektor4 = array_sum($matrixNilaiKriteria[3]);

        // Membuat kolom prioritas pada setiap kriteria dengan membagikan prioritas vektor dengan jumlah kriteria yang dipilih
        $pri1 = $priVektor1 / count($matrix);
        $pri2 = $priVektor2 / count($matrix);
        $pri3 = $priVektor3 / count($matrix);
        $pri4 = $priVektor4 / count($matrix);

        // Menghitung jumlah dari maks lamda atau eigen value setiap kriteria
        $eigenValue1 = $pri1 * $tpIntensitas1;
        $eigenValue2 = $pri2 * $tpIntensitas2;
        $eigenValue3 = $pri3 * $tpIntensitas3;
        $eigenValue4 = $pri4 * $tpIntensitas4;

        $totalEigenValue = $eigenValue1 + $eigenValue2 + $eigenValue3 + $eigenValue4;

        //Mencari Nilai Konsisten Atau Tidak
        $CI = ($totalEigenValue - count($matrix)) / (count($matrix) - 1);
        $RI = 0.90;
        $CR = $CI / $RI;
        $kriTemp = $CR;

        return [$kriTemp, $CR, $pri1, $pri2, $pri3, $pri4];
    }

    public function index()
    {
        $ahps = PeringkatAhp::with('siswa')->orderByDesc('nilaiAhp')->paginate(10);
        return view('ahp.index', ['ahps' => $ahps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteriaSiswas = KriteriaSiswa::all();

        if (count($kriteriaSiswas) < 1) {
            Alert::error('Gagal', "Mohon Mengisi Kriteria Siswa Terlebih Dahulu!");
            return redirect('/peringkat-ahp');
        } else {
            PeringkatAhp::deleteAll();

            $kriteria = [
                [   1,     1/3,    1/5,    1/7,     ],
                [   3,     1,      1/3,    1/5,     ],
                [   5,     3,      1,      1/3,     ],
                [   7,     5,      3,      1,       ],
            ];

            $subKriteria = [
                [1,     1 / 3,      1 / 5,      1 / 7,      1 / 9       ],
                [3,     1,          1 / 3,      1 / 5,      1 / 7       ],
                [5,     3,          1,          1 / 3,      1 / 5       ],
                [7,     5,          3,          1,          1 / 3       ],
                [9,     7,          5,          3,          1           ],
            ];


            $matrixKriteria    = $this->kriteria($kriteria);
            $matrixSubKriteria = $this->subKriteria($subKriteria);

            list($kriTemp, $kriCR, $kriPri1, $kriPri2, $kriPri3, $kriPri4) = $matrixKriteria;

            list($subTemp, $subCR, $subPri1, $subPri2, $subPri3, $subPri4, $subPri5) = $matrixSubKriteria;

            $kriteriaSiswas = KriteriaSiswa::all();

            foreach ($kriteriaSiswas as $kriteriaSiswa) {
                if ($kriteriaSiswa->sikap === 'E') {
                    $hSikap = $subPri1 * $kriPri1;
                } elseif ($kriteriaSiswa->sikap === 'D') {
                    $hSikap = $subPri2 * $kriPri1;
                } elseif ($kriteriaSiswa->sikap === 'C') {
                    $hSikap = $subPri3 * $kriPri1;
                } elseif ($kriteriaSiswa->sikap === 'B') {
                    $hSikap = $subPri4 * $kriPri1;
                } else {
                    $hSikap = $subPri5 * $kriPri1;
                }

                if ($kriteriaSiswa->kehadiran < 65) {
                    $hKehadiran = $subPri1 * $kriPri2;
                } elseif ($kriteriaSiswa->kehadiran >= 65 && $kriteriaSiswa->kehadiran <= 75) {
                    $hKehadiran = $subPri2 * $kriPri2;
                } elseif ($kriteriaSiswa->kehadiran >= 76 && $kriteriaSiswa->kehadiran <= 85) {
                    $hKehadiran = $subPri3 * $kriPri2;
                } elseif ($kriteriaSiswa->kehadiran >= 86 && $kriteriaSiswa->kehadiran <= 95) {
                    $hKehadiran = $subPri4 * $kriPri2;
                } else {
                    $hKehadiran = $subPri5 * $kriPri2;
                }

                if ($kriteriaSiswa->nilai_rata < 65) {
                    $hNilaiRata = $subPri1 * $kriPri3;
                } elseif ($kriteriaSiswa->nilai_rata >= 65 && $kriteriaSiswa->nilai_rata <= 75) {
                    $hNilaiRata = $subPri2 * $kriPri3;
                } elseif ($kriteriaSiswa->nilai_rata >= 76 && $kriteriaSiswa->nilai_rata <= 85) {
                    $hNilaiRata = $subPri3 * $kriPri3;
                } elseif ($kriteriaSiswa->nilai_rata >= 86 && $kriteriaSiswa->nilai_rata <= 95) {
                    $hNilaiRata = $subPri4 * $kriPri3;
                } else {
                    $hNilaiRata = $subPri5 * $kriPri3;
                }

                if ($kriteriaSiswa->olimpiade === 0) {
                    $hOlimpiade = $subPri1 * $kriPri4;
                } elseif ($kriteriaSiswa->olimpiade === 1) {
                    $hOlimpiade = $subPri2 * $kriPri4;
                } elseif ($kriteriaSiswa->olimpiade === 2) {
                    $hOlimpiade = $subPri3 * $kriPri4;
                } elseif ($kriteriaSiswa->olimpiade === 3) {
                    $hOlimpiade = $subPri4 * $kriPri4;
                } else {
                    $hOlimpiade = $subPri5 * $kriPri4;
                }

                $totalAhp = $hOlimpiade + $hNilaiRata + $hKehadiran + $hSikap;

                $validateData = [
                    'siswa_id'  => $kriteriaSiswa->siswa_id,
                    'sikap'     => $hSikap,
                    'kehadiran' => $hKehadiran,
                    'nilai_rata'=> $hNilaiRata,
                    'olimpiade' => $hOlimpiade,
                    'nilaiAhp'  => $totalAhp,
                ];
                PeringkatAhp::create($validateData);
            }

            Alert::success('Berhasil', "Berhasil Memproses Peringkat AHP");
            return redirect('/peringkat-ahp');

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
    public function show(PeringkatAhp $peringkatAhp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeringkatAhp $peringkatAhp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeringkatAhp $peringkatAhp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeringkatAhp $peringkatAhp)
    {
        //
    }
}
