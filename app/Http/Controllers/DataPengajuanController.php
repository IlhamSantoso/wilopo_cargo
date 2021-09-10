<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;

class DataPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPengajuan = Cuti::join('users', 'users.id', '=', 'cutis.user_id')
                        ->select('cutis.id', 'nama', 'jabatan', 'departemen', 'tgl_pengajuan', 'tgl_awal', 'tgl_akhir', 'lama_hari', 'keterangan')
                        ->where('cutis.status', 'P')
                        ->get();

        return view('data-master-cuti.data-pengajuan', ['dataPengajuan' => $dataPengajuan]);
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
        //
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
        //
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
        $statusInput = $request->input('status');

        if($statusInput == "N"){
            $cuti = Cuti::find($id);
            $cuti->status = "N";
            $cuti->save();
        }else{
            $cuti = Cuti::find($id);
            $cuti->status = "Y";
            $cuti->save();
    
            $karyawan = User::find($cuti->user_id);
            $karyawan->cuti_diambil = $cuti->lama_hari;
            $karyawan->sisa_cuti = $karyawan->total_cuti - $cuti->lama_hari;
            $karyawan->save();
        }

        $request->session()->flash('success', 'Data berhasil diupdate');
        return redirect('data-pengajuan-cuti');
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
