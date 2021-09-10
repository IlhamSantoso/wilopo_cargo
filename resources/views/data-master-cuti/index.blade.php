@extends('app')
@section('title', 'Data Master Cuti')

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
            <a href="{{ route('data-master-cuti.create') }}">
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
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Total Cuti</th>
                            <th>Cuti Diambil</th>
                            <th>Sisa Cuti</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMasterCuti as $keys=>$data)
                            <tr>
                                <td>{{ ++$keys }}</td>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['jabatan'] }}</td>
                                <td>{{ $data['departemen'] }}</td>
                                <td>{{ $data['total_cuti'] }} Hari</td>
                                <td>{{ $data['cuti_diambil'] }} Hari</td>
                                <td>{{ $data['sisa_cuti'] }} Hari</td>
                                <td class="text-center">
                                    <a href="{{ route('data-master-cuti.edit', $data['id']) }}">
                                        <button type="button" class="btn btn-primary btn-sm p-2">
                                            Edit
                                        </button>
                                    </a>
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