<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\KriteriaSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\error;

class KriteriaSiswaController extends Controller
{
    public function index() {
        $kriteriaSiswas = KriteriaSiswa::with('siswa')->paginate(10);
        return view('kriteria-siswa.index', ['kriteriaSiswas' => $kriteriaSiswas]);
    }

    public function create()
    {
        $siswas = Siswa::orderBy('nama')->get();

        if(count($siswas) < 1)
        {
            Alert::error('Gagal', "Mohon Tambahkan Siswa Terlebih Dahulu");
            return redirect('/kriteria-siswa');
        }else{
            return view('kriteria-siswa.create', ['siswas' => $siswas]);
        }

    }

    public function store(Request $request)
    {
            $validateData = $request->validate([
                'siswa_id'   => 'required|unique:kriteria_siswas,siswa_id',
                'olimpiade'  => 'required|numeric',
                'nilai_rata' => 'required',
                'sikap'      => 'required',
                'kehadiran'  => 'required',
            ]);
            // dump($request);
            KriteriaSiswa::create($validateData);
            return redirect($request->url_asal);   
    }

    public function edit(KriteriaSiswa $kriteriaSiswa)
    {
        $siswas = Siswa::orderBy('nis','asc')->get();
        return view('kriteria-siswa.edit', [
            'kriteriaSiswa' => $kriteriaSiswa,
            'siswas' => $siswas,
        ]);
    }


    public function Update(Request $request, KriteriaSiswa $kriteriaSiswa)
    {
        
        $validateData = $request->validate([
            'siswa_id'   => 'required',
            'olimpiade'  => 'required',
            'nilai_rata' => 'required',
            'sikap'      => 'required',
            'kehadiran'  => 'required',
        ]);

        $kriteriaSiswa->update($validateData);
        Alert::success('Berhasil', "Berhasil mengubah kriteria");
        return redirect($request->url_asal);
    }
}
