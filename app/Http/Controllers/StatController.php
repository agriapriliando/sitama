<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stat.daftar', [
            'stats' => Stat::all(),
        ]);
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
            'note' => 'required',
        ]);

        Stat::create([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        return redirect('admin/stats')->with('status', 'Jenis Status Penerima Beasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function show(Stat $stat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function edit(Stat $stat)
    {
        return view('admin.stat.edit', [
            'stat' => $stat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'name' => 'required',
            'note' => 'required',
        ]);

        $stat->update($request->all());

        return redirect('admin/stats')->with('status', 'Jenis Status Penerima Beasiswa Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect('admin/stats')->with('status','Jenis Status Penerima Beasiswa dihapus');
    }
}
