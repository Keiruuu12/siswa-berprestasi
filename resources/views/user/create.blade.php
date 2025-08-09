@extends('layouts.app')
@section('title', 'Form User')
@section('content')
<div class="pt-3">
    <h1 class="h2">Tambah User</h1>
</div>
<hr>
<form action="{{ route('users.store') }}" method="post">
    @include('user.form', ['tombol' => 'Tambah'])
</form>

@endsection