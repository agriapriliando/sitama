<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $students = Student::with('user','program','scholarship','stat')->get();
        return view('admin', compact('students'));
    }
}
