<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $persyaratan = Notice::where('title', 'persyaratan')->first();
        $pendaftaran = Notice::where('title', 'pendaftaran')->first();
        $narahubung = Notice::where('title', 'narahubung')->first();
        return view('landing', compact('persyaratan', 'pendaftaran', 'narahubung'));
    }
}
