<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            $user = Auth::user();
            if ($user->id == 9999) {
                $jenis_akun = 'Administrator Utama';
            } elseif ($user->role == 'adm') {
                $jenis_akun = 'Administrator';
            } else {
                $jenis_akun = 'Mahasiswa';
            }
            session([
                'user' => $user->role,
                'id' => $user->id,
                'check' => $user->check,
                'name' => $user->name,
                'jenis_akun' => $jenis_akun,
            ]);
            if ($user->role == "adm") {
                return redirect('admin')->with('status', 'Anda Berhasil Login');
            } elseif ($user->role == "mhs") {
                return redirect('beasiswa')->with('status', 'Anda Berhasil Login');
            } else {
                return redirect('login')->with('status', 'Username atau Password Salah');
            }

        }
        return redirect('login')->with('status', 'Username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Anda berhasil logout');
        // $request->session()->forget('user'); untuk menghapus id user pada session
    }
}
