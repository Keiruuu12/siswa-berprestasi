<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyisAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $roleId = $request->user()->role_id;
        $adminId = Role::where('role_name', 'admin')->first()->id;

        if($roleId != $adminId) {
            Alert::error('Gagal', "Anda tidak memiliki akses");
            return redirect('/siswa');
        }
        return $next($request);
    }


}
