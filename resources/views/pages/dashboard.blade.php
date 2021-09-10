@extends('app')

@section('title', 'Dashboard')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body dashboard-tabs p-0">
                <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar-text icon-lg mr-3 text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Jumlah Cuti Tahunan</small>
                                <h5 class="mr-2 mb-0">{{ Auth::user()->total_cuti }} Hari</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar-clock mr-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Jumlah Cuti Diambil</small>
                                <h5 class="mr-2 mb-0">{{ Auth::user()->cuti_diambil }} Hari</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar mr-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Jumlah Sisa Cuti</small>
                                <h5 class="mr-2 mb-0">{{ Auth::user()->sisa_cuti }} Hari</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Status Pengjuan Cuti</p>
                <div class="table-responsive">
                <table id="recent-purchases-listing" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Awal Cuti</th>
                            <th>Tanggal Akhir Cuti</th>
                            <th>Jumlah Hari</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataCuti->pengajuan as $keys=>$data)
                            <tr>
                                <td>{{ ++$keys }}</td>
                                <td>{{ $data['tgl_pengajuan'] }}</td>
                                <td>{{ $data['tgl_awal'] }}</td>
                                <td>{{ $data['tgl_akhir'] }}</td>
                                <td>{{ $data['lama_hari'] }} Hari</td>
                                <td>
                                    @if ($data['status'] == 'Y')
                                        <i class="mdi mdi-checkbox-marked-circle text-success"> Disetujui!</i>
                                    @elseif($data['status'] == 'P')
                                        <i class="mdi mdi-clock-alert text-secondary"> Pending!</i>
                                    @else
                                        <i class="mdi mdi-close-octagon text-danger"> Ditolak!</i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($data['status'] == 'P')
                                        <a href="{{ route('pengajuan-cuti.edit', $data['id']) }}">
                                            <button type="button" class="btn btn-primary btn-sm p-2">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('pengajuan-cuti.destroy', $data['id']) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm p-2" onclick="return confirm('Data akan dihapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
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