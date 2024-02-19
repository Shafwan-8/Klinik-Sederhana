@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Riwayat Pemeriksaan : {{ $patient->name }}</h3>
@endsection

@section('container')
    <div class="card">
        <div class="card-header p-0 d-flex justify-content-end px-3 py-2">
            <a class="btn btn-primary" href="{{ route('pemeriksaan.create', request('pemeriksaan')) }}">Tambah</a>
            <a class="btn btn-secondary mx-3" href="{{ route('pemeriksaan.index') }}">Kembali</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>No. Registrasi</th>
                        <th>Ket.</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-dark">
                    @forelse ($inspections as $inspection)
                        <tr class="text-center">
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td>{{ $inspection->created_at->format('l, d F Y') }}</td>
                            <td>{{ $inspection->no_registrasi }}</td>
                            <td>
                                <div class="btn-group mt-2">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Surat Keterangan
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('surat.dokter', $inspection->id) }}">Keterangan Dokter</a>
                                        <a class="dropdown-item" href="{{ route('surat.sehat', $inspection->id) }}">Keterangan Sehat</a>
                                        <a class="dropdown-item" href="{{ route('surat.buta-warna', $inspection->id) }}">Keterangan Buta Warna</a>
                                    </div>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="d-flex justify-content-around">
                                        
                                    <a class="btn btn-warning btn-sm text-white"
                                        href="{{ route('pemeriksaan.edit', $inspection->id) }}"
                                    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                    </a>

                                    <a class="btn btn-primary btn-sm text-white"
                                        href="{{ route('pemeriksaan.detail', $inspection->id) }}"
                                    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                    </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="my-5 text-center">
                                    <h3>Data tidak ditemukan.</h3>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
