<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'ADMIN'){
            $karyawan = User::all();
        }elseif(Auth::user()->role == 'HR'){
            $karyawan = User::where('role',  'KARYAWAN')->get();
        }

        $data = [
            'karyawan' => $karyawan
        ];

        return view('karyawan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'nama' => 'required|max:100',
            'username' => 'required|unique:users|max:50',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users',
            'jabatan' => 'required|max:50',
            'role' => 'required|max:10',
            'status' => 'max:1',
            'departemen' => 'required|max:50',
        ]);

        $validator['password'] = Hash::make($validator['password']);

        User::create($validator);

        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('managemen-karyawan');
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
        $karyawan = User::find($id);

        return view('karyawan.edit', ['karyawan'=>$karyawan]);
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
            'nama' => 'required|max:100',
            'username' => 'required|max:50',
            'email' => 'required|email',
            'jabatan' => 'required|max:50',
            'role' => 'required|max:10',
            'status' => 'max:1',
            'departemen' => 'required|max:50',
        ]);

        $karyawan = User::find($id);

        $karyawan->update($validator);

        $request->session()->flash('success', 'Data berhasil diupdate');
        return redirect('managemen-karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('managemen-karyawan')->with('success', 'Data berhasil dihapus');
    }
}
