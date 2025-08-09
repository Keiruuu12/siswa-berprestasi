@extends('layouts.app')
@section('title', 'kriteria siswa')
@section('content')
    <h1 class="display-4 text-center my-5" id="judul">Kriteria Siswa</h1>
    @auth
    <div class="text-end mt-5 pb-4">
        <a href="{{ route('kriteria-siswa.create') }}" class="btn btn-info">Tambah</a>
    </div>
    @endauth
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Olimpiade</th>
                <th>Nilai Rata - rata</th>
                <th>Sikap</th>
                <th>Kehadiran</th>
                @auth
                <th>Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>

            @foreach ($kriteriaSiswas as $kriteriaSiswa)
                <tr>
                    <td>{{ $kriteriaSiswa->siswa->nama }}</td>
                    <td>{{ $kriteriaSiswa->siswa->nis }}</td>
                    <td>{{ $kriteriaSiswa->olimpiade }}</td>
                    <td>{{ $kriteriaSiswa->nilai_rata }}</td>
                    <td>{{ $kriteriaSiswa->sikap }}</td>
                    <td>{{ $kriteriaSiswa->kehadiran }}</td>
                    @auth
                    <td>
                        <a href="{{ route('kriteria-siswa.edit', ['kriteria_siswa' => $kriteriaSiswa->id]) }}" title="Edit Kriteria Siswa" class="btn btn-secondary">EDIT</a>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $kriteriaSiswas->fragment('judul')->links() }}
        </div>
    </div>


@endsection
