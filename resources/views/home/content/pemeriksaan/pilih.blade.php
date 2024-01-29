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
                    </tr>
                </thead>

                <tbody class="text-dark">
                    @forelse ($inspections as $inspection)
                        <tr class="text-center">
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td>{{ $inspection->created_at->setTimezone('Asia/Makassar')->format('l, d F Y') }}</td>
                            <td>{{ $inspection->no_registrasi }}</td>
                            <td width="10%">
                                <div class="d-flex justify-content-around">
                                        
                                    <a class="btn btn-warning btn-sm text-white"
                                        href="{{ route('pemeriksaan.edit', $inspection->id) }}"
                                    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                      </svg>
                                    </a>

                                    <a 
                                        class="btn btn-danger btn-sm text-white"
                                        onclick="if(confirm('Apakah anda yakin ingin menghapus riwayat ini?')) {
                                            event.preventDefault();
                                            document.getElementById('hapus-riwayat-{{ $inspection->id }}').submit(); }"
                                    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                    </a>

                                    <form 
                                        id="hapus-riwayat-{{ $inspection->id }}" 
                                        action="{{ route('pemeriksaan.destroy', $inspection->id) }}" 
                                        method="post"
                                    >
                                        @csrf
                                        @method('delete')

                                    </form>
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
