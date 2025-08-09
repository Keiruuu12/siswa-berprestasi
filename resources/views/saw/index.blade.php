@extends('layouts.app')
@section('title', 'Peringkat SAW')
@section('content')
    <h1 class="display-4 text-center my-5" id="judul">Peringkat SAW</h1>
    @auth
    <div>
        <a href="{{ route('peringkat-saw.create') }}" class="btn btn-primary">Proses</a>
    </div>
    @endauth
    <h1>Peringkat SAW</h1>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($saws as $saw)
                <tr>
                    <td>{{ $saws->firstItem() + $loop->iteration - 1 }}</td>
                    <td>{{ $saw->siswa->nama }}</td>
                    <td>{{ $saw->siswa->nis }}</td>
                    <td>{{ $saw->siswa->kelas }}</td>
                    <td>{{ $saw->nilaiSaw }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $saws->fragment('judul')->links() }}
        </div>
    </div>

@endsection

