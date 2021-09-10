@extends('app')
@section('title', 'Managemen Karyawan - Edit')

@section('content')
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('managemen-karyawan.update', $karyawan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ (old('nama')) ? old('nama') : $karyawan->nama }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="Username" name="username" placeholder="Username" value="{{ (old('username')) ? old('username') : $karyawan->username }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ (old('jabatan')) ? old('jabatan') : $karyawan->jabatan }}">
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <input type="text" class="form-control @error('departemen') is-invalid @enderror" id="departemen" name="departemen" placeholder="Departemen" value="{{ (old('departemen')) ? old('departemen') : $karyawan->departemen }}">
                                    @error('departemen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ (old('email')) ? old('email') : $karyawan->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                @if (Auth::user()->role == 'ADMIN')
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                                    @if (Auth::user()->role == 'ADMIN')
                                                        <option value="{{ $karyawan->role }}" selected>
                                                            @if ($karyawan->role == 'ADMIN')
                                                                Admin
                                                            @elseif($karyawan->role == 'HR')
                                                                Human Resource
                                                            @else
                                                                Karyawan
                                                            @endif
                                                        </option>
                                                        <option value="ADMIN">Admin</option>
                                                        <option value="HR">Human Resource</option>
                                                    @endif
                                                    <option value="KARYAWAN"> Karyawan</option>
                                                </select>
                                                @error('role')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="{{ $karyawan->status }}" selected>
                                                        @if ($karyawan->status == 'Y')
                                                            Aktif
                                                        @else
                                                            Non Aktif
                                                        @endif
                                                    </option>
                                                    <option value="N"> Non Aktif</option>
                                                    <option value="Y"> Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            @if (Auth::user()->role === 'ADMIN')
                                                <option value="{{ $karyawan->role }}" selected>
                                                    @if ($karyawan->role == 'ADMIN')
                                                        Admin
                                                    @elseif($karyawan->role == 'HR')
                                                        Human Resource
                                                    @else
                                                        Karyawan
                                                    @endif
                                                </option>
                                                <option value="ADMIN">Admin</option>
                                                <option value="HR">Human Resource</option>
                                            @endif
                                            <option value="KARYAWAN"> Karyawan</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="reset" class="btn btn-light">Reset</button>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection