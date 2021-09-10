@extends('app')
@section('title', 'Managemen Karyawan')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('managemen-karyawan.create') }}">
                <button type="button" class="btn btn-primary btn-sm">
                    <i class="mdi mdi-account-plus icon-sm"></i> Tambah Data
                </button>
            </a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12 stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="data-karyawan" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $keys=>$data)
                            <tr>
                                <td>{{ ++$keys }}</td>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['username'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <td>{{ $data['jabatan'] }}</td>
                                <td>{{ $data['departemen'] }}</td>
                                <td>{{ ($data['status'] == 'Y') ? 'Aktif' : 'Non Aktif'  }}</td>
                                <td>
                                    @if ($data['role'] == 'ADMIN')
                                        Admin
                                    @elseif($data['role'] == 'HR')
                                        Human Resource
                                    @else
                                        Karyawan
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('managemen-karyawan.edit', $data['id']) }}">
                                        <button type="button" class="btn btn-primary btn-sm p-2">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('managemen-karyawan.destroy', $data['id']) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm p-2" onclick="return confirm('Data akan dihapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection