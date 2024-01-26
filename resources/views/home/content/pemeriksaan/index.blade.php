@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Daftar Pengguna :</h3>
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
                    @forelse ($users as $user)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href='{{ route('pemeriksaan.show', $user->id) }}' class="btn btn-outline-secondary btn-sm">Pilih</a>
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
