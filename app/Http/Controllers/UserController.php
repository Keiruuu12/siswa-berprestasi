<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('user.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'role_id' => 'nullable',
            'password' => 'required|min_digits:8',
            'email' => 'required|email|unique:users,email',
        ]);
        // dd($validateData);
        User::create($validateData);
        Alert::success('Berhasil', "Berhasil menambahkan $request->name");
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Berhasil', "$user->nama berhasil dihapus");
        return redirect('/users');
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'user_id' => 'required',
        ]);

        $userId = $request->user_id;
        $roleId = $request->role_id;

        $user = User::find($userId);
        $user->role_id = $roleId;
        $user->save();

        Alert::success('Berhasil', "Role berhasil diubah");
        return redirect('/users');

    }
}
