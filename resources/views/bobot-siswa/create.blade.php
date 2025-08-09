@extends('layouts.app')
@section('title', 'Proses Perhitungan Bobot')
@section('content')


    <h1>Tabel Testing</h1>
    <div>
        <table>
            <tr>
                <th>Nama</th>
                <th>Olimpiade</th>
                <th>Nilai Rata</th>
                <th>Sikap</th>
                <th>Kehadiran</th>
            </tr>
            @foreach ($kriteriaSiswas as $kriteriaSiswa)
            <tr>
                <td>{{ $kriteriaSiswa->siswa->nama }}</td>
                <td>{{ $kriteriaSiswa->olimpiade }}</td>
                <td>{{ $kriteriaSiswa->nilai_rata }}</td>
                <td>{{ $kriteriaSiswa->sikap }}</td>
                <td>{{ $kriteriaSiswa->kehadiran }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection