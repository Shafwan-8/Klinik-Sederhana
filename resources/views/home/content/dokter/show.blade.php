@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Detail Dokter : {{ $dokter->nama }}</h1>
</div>

@endsection

@section('container')
    <div class="card">
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
            class="btn btn-dark"
            href="{{ route('dokter.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            <ol class="list-group text-dark">
                @if ($dokter->foto)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <img
                                class="w-100 rounded-lg"
                                src="{{ asset('storage/' . $dokter->foto) }}"
                                alt="Foto {{ $dokter->nama }}"
                            />
                        </div>
                    </li>
                @endif
                    
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <span>Nama @if (auth()->user()->role == 'admin') Admin @else Dokter @endif</span>
                        <div class="fw-bold">{{ $dokter->nama }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div class="me-auto ms-2">
                        <span>Nama Akun Pengguna</span>
                        <div class="fw-bold">{{ $dokter->user->name }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div class="me-auto ms-2">
                        <span>Inisial</span>
                        <div class="fw-bold">{{ strtoupper($dokter->inisial) }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div class="me-auto ms-2">
                        <span>Email Pengguna</span>
                        <div class="fw-bold">{{ $dokter->user->email }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>No KTP</span>
                        <div class="fw-bold">{{ $dokter->no_ktp }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>NO HP</span>
                        <div class="fw-bold">{{ $dokter->no_hp }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>SIP</span>
                        <div class="fw-bold">{{ $dokter->sip }}</div>
                    </div>
                </li>


                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Alamat</span>
                        <div class="fw-bold">{{ $dokter->alamat }}</div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
@endsection