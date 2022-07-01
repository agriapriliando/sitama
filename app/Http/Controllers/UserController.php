<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('id') == 9999) {
            $users = User::where('role', 'adm')->get();
        } else {
            $users = User::where('role', 'adm')->where('id','!=',9999)->get();
        }
        return view('admin.user.daftar', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|alpha|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required',
        ]);

        if ($request->defaultpass == 1) {
            $password = bcrypt($request->username);
        } else {
            $password = bcrypt($request->password);
        }

        $name = Str::of($request->name)->title();

        User::create([
            'name' => $name,
            'username' => Str::of($request->username)->lower(),
            'email' => $request->email,
            'password' => $password,
            'role' => 'adm',
            'check' => $request->check,
        ]);

        return redirect('admin/users')->with('status','Akun <b>'.$name.'</b> Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,'.$user->id,
            'username' => 'required|alpha|unique:users,username,'.$user->id,
            'email' => 'nullable|email|unique:users,email,'.$user->id,
        ]);

        if ($request->defaultpass == 1) {
            $password = bcrypt($request->username);
        } elseif ($request->defaultpass == null && $request->password == null) {
            $password = $user->password;
        } else {
            $password = bcrypt($request->password);
        }

        $name = Str::of($request->name)->title();

        $user->update([
            'name' => $name,
            'username' => Str::of($request->username)->lower(),
            'email' => $request->email,
            'password' => $password,
            'check' => $request->check,
        ]);

        return redirect('admin/users')->with('status','Akun <b>'.$name.'</b> Berhasil Diperbaharui');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role == "adm") {
            $user->delete();
            return redirect('admin/users')->with('status','Akun <b>'.$user->name.'</b> Berhasil Dihapus');
        } else {
            return redirect('admin/users')->with('status','Akun Tidak Bisa Dihapus');
        }
    }
}
