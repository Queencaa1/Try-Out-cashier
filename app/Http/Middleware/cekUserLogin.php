<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan impor kelas Auth

class cekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  $rules
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rules)
    {
        // Periksa apakah pengguna terotentikasi
        if (!Auth::check()) {
            return redirect('login');
        }

        // Dapatkan informasi pengguna saat ini
        $user = Auth::user();

        // Periksa peran pengguna
        if ($user && $user->level == $rules) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki akses, redirect ke halaman login dengan pesan kesalahan
        return redirect('login')->with('error', 'You have no privilege');
    }
    
}
class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user && $user->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
