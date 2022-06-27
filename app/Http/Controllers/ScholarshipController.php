<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('admin.scholarship.daftar', compact('scholarships'));

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
            'name' => 'required|unique:programs',
            'nominal' => 'required',
        ]);

        Scholarship::create([
            'name' => $request->name,
            'nominal' => $request->nominal,
        ]);

        return redirect('admin/scholarships')->with('status', 'Jenis Beasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarship.edit', [
            'scholarship' => $scholarship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'name' => 'required',
            'nominal' => 'required',
        ]);
        $scholarship->update($request->all());

        return redirect('admin/scholarships')->with('status', 'Jenis Beasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect('admin/scholarships')->with('status', 'Jenis Beasiswa Berhasil dihapus');
    }
}
