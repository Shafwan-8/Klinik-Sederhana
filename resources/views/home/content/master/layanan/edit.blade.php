@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Tambah Layanan:</h3>
@endsection


@section('container')
    <form class="card" action="{{ route('layanan.update', $service->id) }}" method="POST">

        <input type="hidden" value="{{ $service->id }}" name="id">
        <div class="card-body">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>

                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                    value="{{ $service->name }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="rates">Harga <small>(Rp)</small> </label>
                
                <input class="form-control @error('rates') is-invalid @enderror" id="rates" name="rates"
                type="text" value="{{ $service->rates }}">
                
                @error('rates')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="payment_method">Metode Pembayaran</label>

                <select class="form-control" name="payment_method" id="payment_method">
                    <option value="" selected disabled>Pilih...</option>
                    @foreach ($payment as $key => $name)
                        <option value="{{ $key }}" {{ $service->payment_method == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                {{-- <input class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" type="text"
                    value="{{ old('payment_method') }}"> --}}

                @error('payment_method')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="keterangan">Keterangan</label>

                <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                    type="keterangan" value="{{ $service->keterangan }}">

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
