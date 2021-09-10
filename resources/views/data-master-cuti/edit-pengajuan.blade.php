@extends('app')
@section('title', 'Pengajuan Cuti - Edit')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengajuan-cuti.update', $dataCuti->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="tgl_awal">Tanggal Awal</label>
                                    <input type="text" class="form-control @error('tgl_awal') is-invalid @enderror" id="tgl_awal" name="tgl_awal" placeholder="YYYY-MM-DD" value="{{ old('tgl_awal') ? old('tgl_awal') : $dataCuti->tgl_awal  }}">
                                    @error('tgl_awal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="tgl_akhir">Tanggal Akhir</label>
                                    <input type="text" class="form-control @error('tgl_akhir') is-invalid @enderror" id="tgl_akhir" name="tgl_akhir" placeholder="YYYY-MM-DD" value="{{ old('tgl_akhir') ? old('tgl_akhir') : $dataCuti->tgl_akhir }}">
                                    @error('tgl_akhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="lama_hari">Lama Hari</label>
                                    <input type="number" min="0" class="form-control @error('lama_hari') is-invalid @enderror" id="lama_hari" name="lama_hari" value="{{ old('lama_hari') ? old('lama_hari') : $dataCuti['lama_hari'] }}">
                                    @error('lama_hari')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') ? old('keterangan') : $dataCuti->keterangan }}">
                                    @error('keterangan')
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