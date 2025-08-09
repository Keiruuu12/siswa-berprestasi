@extends('layouts.app')
@section('title', 'Nilai Bobot Kriteria Siswa')
@section('content')
    <h1 class="display-4 text-center my-5" id="judul">Bobot Siswa</h1>
    @auth
    <div>
        <a href="{{ route('bobot-siswa.create') }}" class="btn btn-primary">Proses</a>
    </div>
    @endauth
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Olimpiade</th>
                <th>Nilai Rata - rata</th>
                <th>Sikap</th>
                <th>Kehadiran</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($bobotKriteriaSiswas as $bobotKriteriaSiswa)
                <tr>
                    <td>{{ $bobotKriteriaSiswa->siswa->nama }}</td>
                    <td>{{ $bobotKriteriaSiswa->olimpiade }}</td>
                    <td>{{ $bobotKriteriaSiswa->nilai_rata }}</td>
                    <td>{{ $bobotKriteriaSiswa->sikap }}</td>
                    <td>{{ $bobotKriteriaSiswa->kehadiran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $bobotKriteriaSiswas->fragment('judul')->links() }}
        </div>
    </div>

@endsection
