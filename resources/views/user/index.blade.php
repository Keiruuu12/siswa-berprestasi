@extends('layouts.app')
@section('title', 'Data Siswa')
@section('content')
    <h1 class="display-4 text-center my-5" id="judul">Data User</h1>
    <div class="text-end pt-5 pb-4">
        <a href="{{ route('users.create') }}" class="btn btn-info">Tambah User</a>
    </div>

    <table class="table table-striped" id="user" data-table="user">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr id="row-{{ $user->id }}">
                    <td>#</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role?->role_name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#roleModal{{ $user->id }}">Ubah Role</button>
                            <form action="{{ route('users.destroy', [$user->id]) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger shadow-none btn-hapus ">Hapus</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
            {{-- {{ $siswas->fragment('judul')->links() }} --}}
        </div>
    </div>
    @foreach ($users as $user)
        <div class="modal fade" id="roleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Role</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.update-role') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div>
                                <label for="role_id">Tentukan Role</label>
                                <select name="role_id" id="role_id" class="form-control mt-2">
                                    <option value="">Pilih Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mt-2  w-100">Ganti Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
