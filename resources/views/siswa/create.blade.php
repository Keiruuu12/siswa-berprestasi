@extends('layouts.app')
@section('title', 'Form Siswa')
@section('content')
<div class="pt-3">
    <h1 class="h2">Tambah Siswa</h1>
</div>
<hr>
<form action="{{ route('siswa.store') }}" method="post">
    @include('siswa.form', ['tombol' => 'Tambah'])
</form>

@endsection