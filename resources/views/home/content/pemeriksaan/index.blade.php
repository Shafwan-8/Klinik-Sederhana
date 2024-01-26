@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Daftar Pasien :</h3>
@endsection

@section('container')
    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                        <th>#</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>No. Hp</th>
                        <th>Alamat</th>
                        <th>Ket.</th>
                    </tr>
                </thead>

                <tbody class="text-dark">
                    @forelse ($patients as $patient)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->nik_numb }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>
                                {{ $patient->hp_numb }}
                            </td>
                            <td>
                                {{ $patient->address }}
                            </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='{{ route('pemeriksaan.show', $patient->id) }}' class="btn btn-outline-secondary btn-sm">Pilih</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="my-5 text-center">
                                    Data tidak ditemukan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
