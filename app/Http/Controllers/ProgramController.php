<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('admin.program.daftar', compact('programs'));
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
            'jenjang' => 'required',
            'fakultas' => 'required',
        ]);

        Program::create([
            'name' => $request->name,
            'jenjang' => $request->jenjang,
            'fakultas' => $request->fakultas,
        ]);

        return redirect('admin/programs')->with('status', 'Program Studi Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('admin.program.show', [
            'program' => $program,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'jenjang' => 'required',
            'fakultas' => 'required',
        ]);

        $program->update([
            'name' => $request->name,
            'jenjang' => $request->jenjang,
            'fakultas' =>$request->fakultas,
        ]);

        // $program->update($request->all());

        return redirect('admin/programs')->with('status', 'Data Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect('admin/programs')->with('status', 'Prodi berhasil dihapus');
    }
}
