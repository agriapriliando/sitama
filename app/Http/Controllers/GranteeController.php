<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GranteeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $student_id = session()->get('id');
        $akun = User::where('id', $student_id)->first();
        $student = Student::where('user_id', $student_id)->first();
        $students = Student::with('user','program','stat','scholarship')->get();
        $notices = Notice::where('title','!=','Pendaftaran')->where('title','!=','Persyaratan')->where('title','!=','Narahubung')->orderByDesc('updated_at')->limit(5)->get();

        //cek kelengkapan data formulir
        $cekdata[] = $student->bank;
        $cekdata[] = $student->no_rekening;
        $cekdata[] = $student->alamat;
        $cekdata[] = $student->no_hp;
        $cekdata[] = $student->berkas_one;
        $cekdata[] = $student->berkas_two;

        // return $cekdata;
        $cekdata = array_filter($cekdata);
        $count = count($cekdata);
        // return $count;
        if ($count == 6) {
            $status_lengkap = "Terima Kasih, Anda Sudah Melengkapi Data secara Lengkap";
        } elseif ($student->berkas_one == null || $student->berkas_two == null) {
            $status_lengkap = "Data Belum Lengkap, Upload Berkas Belum Lengkap";
        } else {
            $status_lengkap = "Anda Belum Memperbaharui Data";
        }
        
        return view('grantee.dashboard', compact('akun', 'student','students', 'notices','status_lengkap', 'count'));
    }
    
    public function edit()
    {
        $student_id = session()->get('id');
        $akun = User::where('id', $student_id)->first();
        $student = Student::with('user','program','stat','scholarship')->where('user_id', $student_id)->first();
        
        //cek kelengkapan data formulir
        $cekdata[] = $student->bank;
        $cekdata[] = $student->no_rekening;
        $cekdata[] = $student->alamat;
        $cekdata[] = $student->no_hp;
        $cekdata[] = $student->berkas_one;
        $cekdata[] = $student->berkas_two;

        // return $cekdata;
        $cekdata = array_filter($cekdata);
        $count = count($cekdata);
        // return $count;
        if ($count == 6) {
            $status_lengkap = "Terima Kasih, Anda Sudah Melengkapi Data secara Lengkap";
        } elseif ($student->berkas_one == null || $student->berkas_two == null) {
            $status_lengkap = "Data Belum Lengkap, Upload Berkas Belum Lengkap";
        } else {
            $status_lengkap = "Data Anda Belum Lengkap";
        }
        
        return view('grantee.edit', compact('akun','student', 'status_lengkap', 'count'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'nama_rekening' => 'required',
                'bank' => 'required',
                'no_rekening' => 'required|numeric',
                'alamat' => 'required',
                'no_hp' => 'required|numeric',
                'berkas_one' => 'file|max:800|mimes:pdf',
                'berkas_two' => 'file|max:800|mimes:pdf',
                'foto' => 'file|max:800|mimes:jpg,jpeg',
            ],
            [
                'berkas_one.mimes' => "Tipe File Harus PDF",
                'berkas_one.size' => "Besar File Maksimal 800KB",
                'berkas_two.mimes' => "Tipe File Harus PDF",
                'berkas_two.size' => "Besar File Maksimal 800KB",
            ]
        );
        $name_rep = Str::replace(' ','_',session()->get('name'));
        $name_strlimit = Str::limit($name_rep,8,'');
        $name_lower = Str::lower($name_strlimit);
        if ($request->file('foto')) {
            $name_img = $name_lower.'.'.$request->file('foto')->extension();
            // return $name_img;
            Storage::delete('foto/'.$name_img);
            $request->file('foto')->storeAs('foto',$name_img,'public');
            Student::where('user_id', session()->get('id'))->update([
                'foto' => $name_img,
            ]);
        }
        // cek field berkas one rek_koran
        if ($request->file('berkas_one')) {
            $berkas_one = $name_lower.'_koran_'.date("dmyHi").'.'.$request->file('berkas_one')->extension();
        } else {
            $berkas_one = "";
        }
        // cek field berkas two rek_buku
        if ($request->file('berkas_two')) {
            $berkas_two = $name_lower.'_buku_'.date("dmyHi").'.'.$request->file('berkas_two')->extension();
        } else {
            $berkas_two = "";
        }
        // return $berkas_one;

        DB::transaction(function () use ($request, $berkas_one, $berkas_two) {
            User::where('id', session()->get('id'))->update([
                'email' => $request->email,
            ]);
            if ($request->password != null) {
                User::where('id', session()->get('id'))->update([
                    'password' => bcrypt($request->password),
                ]);
            }
            // upload berkas one rek_koran
            if (!empty($request->berkas_one)) {
                Storage::delete('rek_koran/'.$berkas_one);
                $request->file('berkas_one')->storeAs('rek_koran',$berkas_one, 'local');
                // Storage::disk('local')->putFile('rekening_koran', $request->file('berkas_one'));
                Student::where('user_id', session()->get('id'))->update([
                    'berkas_one' => $berkas_one,
                ]);
            }
            // upload berkas two rek_buku
            if (!empty($request->berkas_two)) {
                Storage::delete('rek_buku/'.$berkas_two);
                $request->file('berkas_two')->storeAs('rek_buku',$berkas_two, 'local');
                Student::where('user_id', session()->get('id'))->update([
                    'berkas_two' => $berkas_two,
                ]);
            }
            Student::where('user_id', session()->get('id'))->update([
                'nama_rekening' => Str::title($request->nama_rekening),
                'no_hp' => $request->no_hp,
                'bank' => $request->bank,
                'no_rekening' => $request->no_rekening,
                'alamat' => $request->alamat,
            ]);
        });
        
        // $request->session()->flash('status', 'Task was successful!');
        return redirect('beasiswa/update')->with('status', 'Data Berhasil Diperbaharui');
    }

    public function download($jenis_dok,$path)
    {
        if ($jenis_dok == "berkas_one") {
            return Storage::download('rek_koran/'.$path);
        } elseif ($jenis_dok == "berkas_two") {
            return Storage::download('rek_buku/'.$path);
        }
    }

    public function akun()
    {
        $user = User::where('id', session()->get('id'))->first();
        return view('grantee.akun', compact('user'));
    }

    public function akunupdate(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
        ]);

        if (!empty($request->password)) {
            User::where('id', session()->get('id'))->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $pesan = "Password berhasil diperbaharui";
            if (!empty($request->email)) {
                $pesan = "Password dan Email berhasil diperbaharui";
            }
        } else {
            User::where('id', session()->get('id'))->update([
                'email' => $request->email,
            ]);
            $pesan = "Email berhasil diperbaharui";
        }

        return redirect('beasiswa/akun')->with('status', $pesan);
    }
}
