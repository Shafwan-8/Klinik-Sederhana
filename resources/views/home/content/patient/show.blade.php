@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Detail Pasien : {{ $patient->name }}</h1>
</div>
@endsection
@section('container')
    <div class="card">
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
            class="btn btn-dark"
            href="{{ route('patient.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            <ol class="list-group text-dark">
                @if ($patient->img_ktp)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <span>Foto KTP</span>
                            <img
                                class="w-100 rounded-lg mt-2"
                                src="{{ asset('storage/' . $patient->img_ktp) }}"
                                alt="Foto KTP"
                            />
                        </div>
                    </li>
                @endif

                @if ($patient->img)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <span>Foto</span>
                            <img
                                class="w-100 rounded-lg mt-2"
                                src="{{ asset('storage/' . $patient->img) }}"
                                alt="Foto"
                            />
                        </div>
                    </li>
                @endif
                    
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>NIK</span>
                        <div class="fw-bold">{{ $patient->nik_numb }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div class="me-auto ms-2">
                        <span>Nama Pasien</span>
                        <div class="fw-bold">{{ $patient->name }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div class="me-auto ms-2">
                        <span>Jenis Kelamin</span>
                        <div class="fw-bold">{{ $patient->gender }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Tanggal Kelahiran</span>
                        <div class="fw-bold">{{ $patient->date_birth }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>No. HP</span>
                        <div class="fw-bold">{{ $patient->hp_numb }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>No. BPJS</span>
                        <div class="fw-bold">{{ $patient->bpjs_numb }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Pekerjaan</span>
                        <div class="fw-bold">{{ $patient->job }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Alamat</span>
                        <div class="fw-bold">{{ $patient->address }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>No. Rekam Medis</span>
                        <div class="fw-bold">{{ $patient->medical_record_numb }}</div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
@endsection