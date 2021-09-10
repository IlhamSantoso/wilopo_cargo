@extends('app')
@section('title', 'Data Pengajuan Cuti')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

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
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Lama Hari</th>
                            <th>Keterangan</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengajuan as $keys=>$data)
                            <tr>
                                <td>{{ ++$keys }}</td>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['jabatan'] }}</td>
                                <td>{{ $data['departemen'] }}</td>
                                <td>{{ $data['tgl_pengajuan'] }}</td>
                                <td>{{ $data['tgl_awal'] }}</td>
                                <td>{{ $data['tgl_akhir'] }}</td>
                                <td>{{ $data['lama_hari'] }} Hari</td>
                                <td>{{ $data['keterangan'] }}</td>
                                <td class="text-center">
                                    <form action="{{ route('data-pengajuan-cuti.update', $data['id']) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="Y" name="status" hidden>
                                        <button type="submit" class="btn btn-primary btn-sm p-2" onclick="return confirm('Setujui Pengajuan?')">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('data-pengajuan-cuti.update', $data['id']) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="N" name="status" hidden>
                                        <button type="submit" class="btn btn-warning btn-sm p-2" onclick="return confirm('Tolak Pengajuan?')">
                                            Tolak
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