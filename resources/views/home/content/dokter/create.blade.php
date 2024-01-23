@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Tambah Dokter</h1>
</div>

@endsection

@section('container')

<form
        class="card"
        action="{{ route('dokter.store') }}"
        method="POST"
        enctype="multipart/form-data"
        >
        
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
            class="btn btn-dark"
            href="{{ route('dokter.index') }}"
            >Kembali</a>
        </div>
        
        <div class="card-body text-dark">
            @csrf
            <div class="row">
            
                <div class="col-md-6">
                        <div class="mb-3">
                        <label
                                class="form-label"
                                for="nama"
                        >Nama</label>
                
                        <input
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama"
                                name="nama"
                                type="text"
                                value="{{ old('nama') }}"
                        >
                
                        @error('nama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                        @enderror
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="mb-3">
                        <label
                            class="form-label"
                            for="no_ktp"
                        >No KTP</label>

                        <input
                            class="form-control @error('no_ktp') is-invalid @enderror"
                            id="no_ktp"
                            name="no_ktp"
                            type="number"
                            value="{{ old('no_ktp') }}"
                        >

                        @error('no_ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="no_hp"
                        >No HP</label>

                        <input
                            class="form-control @error('no_hp') is-invalid @enderror"
                            id="no_hp"
                            name="no_hp"
                            type="number"
                            value="{{ old('no_hp') }}"
                        >

                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="sip"
                        >SIP</label>

                        <input
                            class="form-control @error('sip') is-invalid @enderror"
                            id="sip"
                            name="sip"
                            type="text"
                            value="{{ old('sip') }}"
                        >

                        @error('sip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label"
                        for="foto"
                        >Foto</label>
                        
                        <input
                            class="form-control @error('foto') is-invalid @enderror"
                            id="foto"
                            name="foto"
                            type="file"
                            value="{{ old('foto') }}"
                        >

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="user_id"
                        >Ubah User :</label>

                        <select class="form-control" id="user_id" name="user_id">
                                        <option value="" selected>Pilih</option>
                                @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                        </select>

                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                        <div class="mb-3">
                                <label
                                class="form-label"
                                for="alamat"
                                >Alamat</label>
                                
                                <textarea
                                class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                        >{{ old('alamat') }}</textarea>
        
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-dark">Simpan</button>
        </div>
    </form>


@endsection