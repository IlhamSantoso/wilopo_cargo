@extends('app')
@section('title', 'Data Master Cuti - Edit')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('data-master-cuti.update', $dataMasterCuti->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 col-sm-12 ">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $dataMasterCuti['username'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 ">
                                <div class="form-group">
                                    <label for="total_cuti">Total Cuti</label>
                                    <input type="number" min="0" class="form-control @error('total_cuti') is-invalid @enderror" id="total_cuti" name="total_cuti" placeholder="Total Cuti" value="{{ old('total_cuti') ? old('total_cuti') : $dataMasterCuti['total_cuti'] }}">
                                    @error('total_cuti')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 ">
                                <div class="form-group">
                                    <label for="cuti_ciambil">Cuti Diambil</label>
                                    <input type="number" min="0" class="form-control @error('cuti_diambil') is-invalid @enderror" id="cuti_diambil" name="cuti_diambil" placeholder="Cuti Diambil" value="{{ old('cuti_diambil') ? old('cuti_diambil') : $dataMasterCuti['cuti_diambil'] }}">
                                    @error('cuti_diambil')
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