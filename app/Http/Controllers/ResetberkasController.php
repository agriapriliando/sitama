<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResetberkasController extends Controller
{
    public function daftarmhs()
    {
        $students = Student::with('user')->get();
        return view('admin.resetberkas.daftar', compact('students'));
    }

    public function resetberkas($id)
    {
        $student = Student::find($id);
        $student_name = $student->nama_rekening;
        DB::transaction(function () use ($student) {
            Storage::delete('rek_koran/'.$student->berkas_one);
            Storage::delete('rek_buku/'.$student->berkas_two);
            $student->update([
                'berkas_one' => '',
                'berkas_two' => '',
            ]);
        });

        return redirect('admin/resetberkas')->with('status', 'Berkas Mahasiswa : <b>'.$student_name.'</b> Berhasil Direset');
    }
}
