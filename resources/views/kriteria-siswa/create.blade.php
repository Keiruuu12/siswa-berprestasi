@extends('layouts.app')
@section('title', 'Form Kriteria Siswa')
@section('content')

<div class="pt-3">
    <h1 class="h2">Tambah Kriteria Siswa</h1>
</div>
<hr>

<form action="{{ route('kriteria-siswa.store') }}" method="post">
    @include('kriteria-siswa.form', ['tombol' => 'Tambah'])
</form>

@endsection