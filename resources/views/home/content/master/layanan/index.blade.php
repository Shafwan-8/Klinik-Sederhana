@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Daftar Layanan :</h3>
@endsection

@section('container')
    <div class="card">

        {{-- @if (auth()->user()->role == 'admin') --}}
        <div class="card-header p-0 d-flex px-3 py-2">
            <div class="row p-0 m-0 w-100">
                <div class="col-6 p-0 mt-3">
                    <form action="{{ route('layanan.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Nama Layanan..." value="{{ request('search') }}" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 p-0 d-flex justify-content-end align-items-center">
                    <a class="btn btn-dark" href="{{ route('layanan.create') }}">Tambah</a>
                </div>
            </div>
        </div>
        {{-- @endif --}}

        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-dark">
                    @forelse ($services as $service)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->name }}</td>
                            <td>Rp.{{ $service->rates }}</td>
                            <td>
                                <div class="d-flex justify-content-around">

                                    <a class="btn btn-warning btn-sm text-white" href="{{ route('layanan.edit', $service->id) }}">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </a>

                                    <a class="btn btn-danger btn-sm text-white"
                                        onclick="if(confirm('Apakah anda yakin ingin menghapus layanan ini?')) {
                                                event.preventDefault();
                                                document.getElementById('hapus-user').submit(); }">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                    </a>

                                    <form id="hapus-user" action="{{ route('layanan.destroy', $service->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="4">
                                <div class="my-5 text-center">
                                    <h5>Data tidak ditemukan.</h5>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="card-footer">
                <div class="pagination border-rounded d-flex justify-content-center">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
