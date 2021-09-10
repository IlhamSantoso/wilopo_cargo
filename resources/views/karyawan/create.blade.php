@extends('app')
@section('title', 'Managemen Karyawan - Buat')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('managemen-karyawan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="Username" name="username" placeholder="Username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (Auth::user()->role == 'ADMIN')
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                                    @if (Auth::user()->role == 'ADMIN')
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
                                            @if (Auth::user()->role == 'ADMIN')
                                                <option value="ADMIN">Admin</option>
                                                <option value="HR">Human Resource</option>
                                            @endif
                                            <option value="KARYAWAN"> Karyawan</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <input type="text" class="form-control @error('departemen') is-invalid @enderror" id="departemen" name="departemen" placeholder="Departemen" value="{{ old('departemen') }}">
                                    @error('departemen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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