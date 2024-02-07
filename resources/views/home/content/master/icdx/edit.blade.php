@extends('home.dashboard.layouts.index')

@section('cssCamera')


@endsection

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Sunting ICDX</h1>
</div>

@endsection

@section('container')
<form
        class="card"
        action="{{ route('icdx.update', $icdx->icId) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
                class="btn btn-dark"
                href="{{ route('icdx.index') }}"
            >Kembali</a>
        </div>
        <div class="card-body text-dark">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="icId"
                        >Kode</label>

                        <input
                            class="form-control @error('icId') is-invalid @enderror"
                            id="icId"
                            name="icId"
                            type="text"
                            value="{{ old('icId') ?? $icdx->icId }}"
                            readonly
                        >

                        @error('icId')
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
                            for="icJenisPenyakit"
                        >Jenis Penyakit</label>

                        <input
                            class="form-control @error('icJenisPenyakit') is-invalid @enderror"
                            id="icJenisPenyakit"
                            name="icJenisPenyakit"
                            type="text"
                            value="{{ old('icJenisPenyakit') ?? $icdx->icJenisPenyakit }}"
                        >

                        @error('icJenisPenyakit')
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
                        for="icNamaLokal"
                        >Nama Lokal</label>
                        
                        <input
                        class="form-control @error('icNamaLokal') is-invalid @enderror"
                        id="icNamaLokal"
                        name="icNamaLokal"
                        type="text"
                        value="{{ old('icNamaLokal') ?? $icdx->icNamaLokal }}" 
                        >
                        
                        @error('icNamaLokal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label mb-3"
                        for="icDTD"
                        >No. DTD</label>
                        
                        <input
                        class="form-control @error('icDTD') is-invalid @enderror"
                        id="icDTD"
                        name="icDTD"
                        type="number"
                        value="{{ old('icDTD') ?? $icdx->icDTD }}"
                        >

                        @error('icDTD')
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
                        for="icSebabSakit"
                        >Sebab Sakit</label>
                        
                        <input
                        class="form-control @error('icSebabSakit') is-invalid @enderror"
                        id="icSebabSakit"
                        name="icSebabSakit"
                        type="text"
                        value="{{ old('icSebabSakit') ?? $icdx->icSebabSakit }}"
                        >

                        @error('icSebabSakit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-dark" type="submit">Simpan Perubahan</button>
        </div>
    </form>


@endsection