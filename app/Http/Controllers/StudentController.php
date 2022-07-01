<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Scholarship;
use App\Models\Stat;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create', [
            'programs' => Program::all(),
            'scholarships' => Scholarship::all(),
            'stats' => Stat::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|numeric|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required'
        ],[
            'username.numeric' => 'Kolom NIM hanya diisi angka saja',
        ]);

        $pembagi = 8;
        $ip_one = $request->ip_one;
        $ip_two = $request->ip_two;
        $ip_three = $request->ip_three;
        $ip_four = $request->ip_four;
        $ip_five= $request->ip_five;
        $ip_six = $request->ip_six;
        $ip_seven = $request->ip_seven;
        $ip_eight = $request->ip_eight;
        if ($ip_one == null){
            $pembagi--;
        }
        if ($ip_two == null){
            $pembagi--;
        }
        if ($ip_three == null){
            $pembagi--;
        }
        if ($ip_four == null){
            $pembagi--;
        }
        if ($ip_five == null){
            $pembagi--;
        }
        if ($ip_six == null){
            $pembagi--;
        }
        if ($ip_seven == null){
            $pembagi--;
        }
        if ($ip_eight == null){
            $pembagi--;
        }
        $total_ip = $ip_one+$ip_two+$ip_three+$ip_four+$ip_five+$ip_six+$ip_seven+$ip_eight;
        if ($pembagi == 0) {
            $ipk = 0;
        } else {
            $ipk = $total_ip/$pembagi;
        }
        if ($request->password == null) {
            $password = bcrypt($request->username);
        } elseif ($request->defaultpass == 1 && $request->password == null) {
            $password = bcrypt($request->username);
        } else {
            $password = bcrypt($request->password);
        }

        DB::transaction(function () use ($request,$password,$ipk) {
            $user = User::create([
                'name' => Str::title($request->name),
                'username' => $request->username,
                'email' => $request->email,
                'check' => $request->check,
                'role' => "mhs",
                'password' => $password,
            ]);
            $user = User::where('name', $request->name)->first();
            Student::create([
                'user_id' => $user->id,
                'program_id' => $request->program_id,
                'scholarship_id' => $request->scholarship_id,
                'stat_id' => $request->stat_id,
                'tahun_beasiswa' => $request->tahun_beasiswa,
                'nim' => $request->username,
                'nama_rekening' => Str::title($request->nama_rekening),
                'no_hp' => $request->no_hp,
                'bank' => $request->bank,
                'no_rekening' => $request->no_rekening,
                'alamat' => $request->alamat,
                'foto' => $request->foto,
                'ip_one' => $request->ip_one,
                'ip_two' => $request->ip_two,
                'ip_three' => $request->ip_three,
                'ip_four' => $request->ip_four,
                'ip_five' => $request->ip_five,
                'ip_six' => $request->ip_six,
                'ip_seven' => $request->ip_seven,
                'ip_eight' => $request->ip_eight,
                'ipk' => $ipk,
                'note' => $request->note,
            ]);
    
        });

        $user = User::where('name', $request->name)->first();

        return redirect('admin')->with('status', 'Mahasiswa '.$user->name.' Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', [
            'student' => $student,
            'programs' => Program::all(),
            'scholarships' => Scholarship::all(),
            'stats' => Stat::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $request->validate([
            'name' => 'required|unique:users,name,'.$student->user->id,
            'username' => 'required|numeric|unique:users,username,'.$student->user->id,
            'email' => 'nullable|email|unique:users,email,'.$student->user->id,
        ],[
            'username.numeric' => 'Kolom NIM hanya diisi angka saja',
            'username.unique' => 'NIM sudah digunakan',
        ]);
        
        $pembagi = 8;
        $ip_one = $request->ip_one;
        $ip_two = $request->ip_two;
        $ip_three = $request->ip_three;
        $ip_four = $request->ip_four;
        $ip_five= $request->ip_five;
        $ip_six = $request->ip_six;
        $ip_seven = $request->ip_seven;
        $ip_eight = $request->ip_eight;
        if ($ip_one == null){
            $pembagi--;
        }
        if ($ip_two == null){
            $pembagi--;
        }
        if ($ip_three == null){
            $pembagi--;
        }
        if ($ip_four == null){
            $pembagi--;
        }
        if ($ip_five == null){
            $pembagi--;
        }
        if ($ip_six == null){
            $pembagi--;
        }
        if ($ip_seven == null){
            $pembagi--;
        }
        if ($ip_eight == null){
            $pembagi--;
        }
        $total_ip = $ip_one+$ip_two+$ip_three+$ip_four+$ip_five+$ip_six+$ip_seven+$ip_eight;
        if ($pembagi == 0) {
            $ipk = 0;
        } else {
            $ipk = $total_ip/$pembagi;
        }
        if ($request->password == null) {
            $password = $student->user->password;
        } elseif ($request->defaultpass == 1 && $request->password == null) {
            $password = bcrypt($request->username);
        } else {
            $password = bcrypt($request->password);
        }
        DB::transaction(function () use ($request,$student,$password,$ipk) {
            User::where('id', $student->user_id)->update([
                'name' => Str::title($request->name),
                'username' => $request->username,
                'email' => $request->email,
                'check' => $request->check,
                'password' => $password,
            ]);
            $student->update([
                'program_id' => $request->program_id,
                'scholarship_id' => $request->scholarship_id,
                'stat_id' => $request->stat_id,
                'tahun_beasiswa' => $request->tahun_beasiswa,
                'nim' => $request->username,
                'nama_rekening' => Str::title($request->nama_rekening),
                'no_hp' => $request->no_hp,
                'bank' => $request->bank,
                'no_rekening' => $request->no_rekening,
                'alamat' => $request->alamat,
                'foto' => $request->foto,
                'ip_one' => $request->ip_one,
                'ip_two' => $request->ip_two,
                'ip_three' => $request->ip_three,
                'ip_four' => $request->ip_four,
                'ip_five' => $request->ip_five,
                'ip_six' => $request->ip_six,
                'ip_seven' => $request->ip_seven,
                'ip_eight' => $request->ip_eight,
                'ipk' => $ipk,
                'note' => $request->note,
            ]);
    
        });

        $user = User::where('name', $request->name)->first();

        return redirect('admin')->with('status', 'Data Mahasiswa <b>'.$user->name.'</b> Berhasil Diupdated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student_id = $student->user_id;
        $student_name = $student->user->name;
        DB::transaction(function () use ($student, $student_id) {
            Storage::disk('public')->delete('foto/'.$student->foto);
            Storage::delete('rek_koran/'.$student->berkas_one);
            Storage::delete('rek_buku/'.$student->berkas_two);
            $student->delete();
            $user = User::find($student_id);
            $user->delete();
        });

        return redirect('admin')->with('status', 'Data '.$student_name.' Berhasil Dihapus');

    }
}
