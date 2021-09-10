<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master-cuti.pengajuan');
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
        $validator = $request->validate([
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'lama_hari' => 'required',
            'keterangan' => 'required|max:100',
        ]);

        if($validator['lama_hari'] > Auth::user()->sisa_cuti){
            $request->session()->flash('warning', 'Sisa cuti anda tidak mencukupi');
        }else{
            $dataCuti = Cuti::create([
                'user_id' => Auth::user()->id,
                'tgl_pengajuan' => Date('Y-m-d'),
                'tgl_awal' => $validator['tgl_awal'],
                'tgl_akhir' => $validator['tgl_akhir'],
                'lama_hari' => $validator['lama_hari'],
                'keterangan' => $validator['keterangan']
            ]);
    
            $request->session()->flash('success', 'Data berhasil ditambahkan');
        }

        return redirect('dashboard');
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
        $dataCuti = Cuti::find($id);

        return view('data-master-cuti.edit-pengajuan', ['dataCuti' => $dataCuti]);
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
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'lama_hari' => 'required',
            'keterangan' => 'required|max:100',
        ]);

        $dataCuti = Cuti::find($id);
        $dataCuti->update($validator);

        $request->session()->flash('success', 'Data berhasil diupdate');
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuti::find($id)->delete();

        return redirect('dashboard')->with('success', 'Data berhasil dihapus');
    }
}
