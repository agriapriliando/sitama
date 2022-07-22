<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $students = Student::with('user','program','scholarship','stat')->get();
        // $studentss = DB::table('students')->groupBy('tahun_beasiswa')->get();
        $programs = Program::get();

        foreach ($programs as $program)
        {
            $dataPoints[] = array(
                'name' => $program->name,
                'data' => [Student::where('program_id', $program->id)->where('stat_id',1)->get()->pluck('nama_rekening')->count()],
            );
        }
        $dataPoints = json_encode($dataPoints);
        return view('admin', compact('students','dataPoints'));
    }
}
