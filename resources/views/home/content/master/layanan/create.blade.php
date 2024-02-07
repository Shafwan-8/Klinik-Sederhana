@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Tambah Layanan:</h3>
@endsection


@section('container')
    <form class="card" action="{{ route('layanan.store') }}" method="POST">


        <div class="card-body">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>

                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="rates">Harga</label>

                <input class="form-control @error('rates') is-invalid @enderror" id="rates" name="rates"
                    type="text" value="{{ old('rates') }}">

                @error('rates')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="keterangan">Keterangan</label>

                <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                    type="keterangan" value="{{ old('keterangan') }}">

                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('layanan.index') }}">Kembali</a>
        </div>
    </form>
@endsection
