<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Scholarship;
use App\Models\Stat;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.menu', [
            'programs' => Program::all(),
            'scholarships' => Scholarship::all(),
            'stats' => Stat::all(),
        ]);
    }

    public function cetak(Request $request)
    {
        $report_version = $request->validate(
            [
                'report_version' => 'required',
            ],
            [
                'report_version.required' => 'Pilih Versi Laporan Terlebih Dahulu',
            ],
        );

        $program_id = $request->program_id;
        $scholarship_id = $request->scholarship_id;
        $stat_id = $request->stat_id;
        
        $choice[] = $program_id;
        $choice[] = $scholarship_id;
        $choice[] = $stat_id;
        $choice = array_filter($choice);
        
        // return $report_version;
        // return $request->all();
        // return $choice;

        if (empty($choice)) {
            $students = Student::with('program','scholarship', 'stat', 'user')->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
        } else {
            if ($program_id != null && $scholarship_id != null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->where('scholarship_id', $scholarship_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id != null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->where('scholarship_id', $scholarship_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id == null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id == null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id != null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id == null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id != null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } else {
                return "error database";
            }
        }
        // cek conditional
        // p s stat
        // 0 0 0 =
        // 1 1 1 =
        // 1 1 0 =
        // 1 0 0 =
        // 0 0 1 =
        // 0 1 1 = 
        // 1 0 1 =
        // 0 1 0 =
        // return $report_version;
        // return ($report_version['report_version'] == "keuangandua");
        if ($report_version['report_version'] == "fakultasone") {
            return view('admin.report.one', compact('students'));
        } elseif ($report_version['report_version'] == "fakultastwo") {
            return view('admin.report.two', compact('students'));
        } elseif ($report_version['report_version'] == "keuanganone") {
            return view('admin.report.three', compact('students'));
        } elseif ($report_version['report_version'] == "keuangantwo") {
            return view('admin.report.four', compact('students'));
        } elseif ($report_version['report_version'] == "monitoring") {
            return view('admin.report.monitoring', compact('students'));
        }

        return view('admin.report.one', compact('students'));
    }

    public function unduhpdf(Request $request)
    {
        $report_version = $request->validate(
            [
                'report_version' => 'required',
            ],
            [
                'report_version.required' => 'Pilih Versi Laporan Terlebih Dahulu',
            ],
        );

        $program_id = $request->program_id;
        $scholarship_id = $request->scholarship_id;
        $stat_id = $request->stat_id;
        
        $choice[] = $program_id;
        $choice[] = $scholarship_id;
        $choice[] = $stat_id;
        $choice = array_filter($choice);
        
        // return $report_version;
        // return $request->all();
        // return $choice;

        if (empty($choice)) {
            $students = Student::with('program','scholarship', 'stat', 'user')->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
        } else {
            if ($program_id != null && $scholarship_id != null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->where('scholarship_id', $scholarship_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id != null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->where('scholarship_id', $scholarship_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id == null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id == null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id != null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id != null && $scholarship_id == null && $stat_id != null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('program_id', $program_id)->where('stat_id', $stat_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } elseif ($program_id == null && $scholarship_id != null && $stat_id == null) {
                $students = Student::with('program','scholarship', 'stat', 'user')->where('scholarship_id', $scholarship_id)->orderBy('program_id')->orderBy('nama_rekening')->orderBy('stat_id')->get();
            } else {
                return "Database Error";
            }
        }
        // cek conditional
        // p s stat
        // 0 0 0 =
        // 1 1 1 =
        // 1 1 0 =
        // 1 0 0 =
        // 0 0 1 =
        // 0 1 1 = 
        // 1 0 1 =
        // 0 1 0 =
        // return $report_version;
        // return ($report_version['report_version'] == "keuangandua");
        if ($report_version['report_version'] == "fakultasone") {
            $pdf = \PDF::loadView('admin.report.one', compact('students'))->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('sitama'.date("dmyHi").'V1.pdf');
        } elseif ($report_version['report_version'] == "fakultastwo") {
            $pdf = \PDF::loadView('admin.report.two', compact('students'))->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('sitama'.date("dmyHi").'V2.pdf');
        } elseif ($report_version['report_version'] == "keuanganone") {
            $pdf = \PDF::loadView('admin.report.three', compact('students'))->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('sitama'.date("dmyHi").'V3.pdf');
        } elseif ($report_version['report_version'] == "keuangantwo") {
            $pdf = \PDF::loadView('admin.report.four', compact('students'))->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('sitama'.date("dmyHi").'V4.pdf');
        } elseif ($report_version['report_version'] == "monitoring") {
            $pdf = \PDF::loadView('admin.report.monitoring', compact('students'))->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('sitama'.date("dmyHi").'monitoring.pdf');
            return view('admin.report.monitoring', compact('students'));
        }

        // $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');
    }
}
