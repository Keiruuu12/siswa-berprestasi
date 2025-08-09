@extends('layouts.app')
@section('title', 'Data Siswa')
@section('content')
    <h1 class="display-4 text-center my-5" id="judul">Data Siswa</h1>
    @auth
    <div class="text-end pt-5 pb-4">
        <a href="{{ route('siswa.create') }}" class="btn btn-info">Tambah Siswa</a>
    </div>
    @endauth

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            @auth
            <th>Aksi</th>
            @endauth
        </tr>
    </thead>
    <tbody>

        @foreach ($siswas as $siswa)
        <tr id="row-{{ $siswa->id }}">
            <td>{{ $siswas->firstItem() + $loop->iteration - 1 }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas }}</td>
            @auth
            <td>
                <a href="{{ route('siswa.edit', ['siswa' => $siswa->id]) }}" title="Edit Siswa" class="btn btn-secondary">EDIT</a>

                <form action="{{ route('siswa.destroy', ['siswa' => $siswa->id]) }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" title="Hapus Siswa" data-name="{{ $siswa->nama }}" data-table="siswa" class="btn btn-danger shadow-none btn-hapus">HAPUS</button>
                </form>
            </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $siswas->fragment('judul')->links() }}
        </div>
    </div>
@endsection
