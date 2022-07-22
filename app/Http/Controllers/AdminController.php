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
        $programs = Program::get();
        // grafik jumlah penerima
        foreach ($programs as $program)
        {
            $dataPoints[] = array(
                'name' => $program->name,
                'data' => [Student::where('program_id', $program->id)->where('stat_id',1)->get()->pluck('nama_rekening')->count()],
            );
        }
        $dataPoints = json_encode($dataPoints);

        // grafik kelengkapan berkas
        foreach ($students as $student)
        {
            if (empty($student->berkas_one))
            {
                $statusBerkas[] = 'Tidak Lengkap';
            } else {
                $statusBerkas[] = 'Lengkap';
            }
        }
        $counts = array_count_values($statusBerkas);
        foreach ($counts as $key => $value)
        {
            $dataCounts[] = array(
                'name' => $key,
                'data' => array($value),
            );
        }
        $dataCounts[0] = $dataCounts[0] + array('color' => '#07cc00');
        $dataCounts[1] = $dataCounts[1] + array('color' => '#FF0000');
        // return $dataCounts;
        $dataCounts = json_encode($dataCounts);
        return view('admin', compact('students','dataPoints','dataCounts'));
    }
}
