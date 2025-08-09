<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswas = Siswa::orderBy('nama')->paginate(10);
        return view('siswa.index', ['siswas' => $siswas ]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'  => 'required',
            'nis'   => 'required|alpha_num|size:10|unique:siswas,nis',
            'kelas' => 'required',
        ]);
        Siswa::create($validateData);
        Alert::success('Berhasil', "Siswa $request->nama berhasil ditambahkan");
        return redirect($request->url_asal);
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {        
        $validateData = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,'.$siswa->id,
            'kelas' => 'required'
        ]);

        $siswa->update($validateData);
        Alert::success('Berhasil', "Siswa $request->nama berhasil di ubah");
        return redirect($request->url_asal);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        Alert::success('Berhasil', "$siswa->nama berhasil dihapus");
        return redirect("/siswa");
    }
}
