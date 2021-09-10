@extends('app')
@section('title', 'Data Master Cuti - Buat')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('data-master-cuti.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <select class="form-control @error('total_cuti') is-invalid @enderror" id="username" name="id">
                                        @foreach ($dataMasterCuti as $data)
                                            <option value="{{ $data['id'] }}">{{ $data['username'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="total_cuti">Total Cuti</label>
                                    <input type="number" min="0" class="form-control @error('total_cuti') is-invalid @enderror" id="total_cuti" name="total_cuti" placeholder="total_cuti" value="{{ old('total_cuti') }}">
                                    @error('total_cuti')
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