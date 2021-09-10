<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMasterCuti = User::all()->where('total_cuti', '<>', null);

        return view('data-master-cuti.index', ['dataMasterCuti' => $dataMasterCuti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataMasterCuti = User::select('id', 'username')->where('total_cuti', '=', null)->get();
        return view('data-master-cuti.create', ['dataMasterCuti' => $dataMasterCuti]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required',
            'total_cuti' => 'required',
        ]);

        $karyawan = User::find($validator['id']);
        $karyawan->total_cuti = $validator['total_cuti'];
        $karyawan->cuti_diambil = 0;
        $karyawan->sisa_cuti = $validator['total_cuti'];
        $karyawan->save();

        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('data-master-cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $dataMasterCuti = User::find($id);
        return view('data-master-cuti.edit', ['dataMasterCuti' => $dataMasterCuti]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'username' => 'required',
            'total_cuti' => 'required',
            'cuti_diambil' => 'required',
        ]);

        $karyawan = User::find($id);
        $karyawan->total_cuti = $validator['total_cuti'];
        $karyawan->cuti_diambil = $validator['cuti_diambil'];
        $karyawan->sisa_cuti = $validator['total_cuti'] - $validator['cuti_diambil'];
        $karyawan->save();

        $request->session()->flash('success', 'Data berhasil diupdate');
        return redirect('data-master-cuti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
