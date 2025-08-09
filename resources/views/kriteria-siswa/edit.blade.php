@extends('layouts.app')
@section('title', 'Form Kriteria Siswa')
@section('content')
<div class="pt-3">
    <h1 class="h2">Edit Kriteria Siswa</h1>
</div>
<hr>s

<div>
    <form action="{{ route('kriteria-siswa.update', ['kriteria_siswa' => $kriteriaSiswa->id]) }}" method="post">
        @method('PATCH')
        @include('kriteria-siswa.form', ['tombol' => 'Update'])
    </form>
</div>
@endsection