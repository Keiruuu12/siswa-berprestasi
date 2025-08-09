@extends('layouts.app')
@section('title', 'Peringkat AHP')
@section('content')
<h1 class="display-4 text-center my-5" id="judul">Peringkat AHP</h1>
@auth
<div>
    <a href="{{ route('peringkat-ahp.create') }}" class="btn btn-primary">Proses</a>
</div>
@endauth
    <h1>Peringkat AHP</h1>
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

            @foreach ($ahps as $ahp)
                <tr>
                    <td>{{ $ahps->firstItem() + $loop->iteration - 1 }}</td>
                    <td>{{ $ahp->siswa->nama }}</td>
                    <td>{{ $ahp->siswa->nis }}</td>
                    <td>{{ $ahp->siswa->kelas }}</td>
                    <td>{{ $ahp->nilaiAhp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $ahps->fragment('judul')->links() }}
        </div>
    </div>
@endsection