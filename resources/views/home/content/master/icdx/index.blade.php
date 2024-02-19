@extends('home.dashboard.layouts.index')

@section('title')

<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
    <h1 class="h2">Daftar ICDX</h1>
</div>



@endsection

@section('container')

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <button class="btn btn-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="my-3 mx-3">
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a class="btn btn-dark" href="{{ route('icdx.create') }}">Tambah</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>jenis Penyakit</th>
                        <th>Nama Lokal</th>
                        <th>DTD</th>
                        <th>Sebab Sakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse ($dataIcdx as $icdx)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $icdx->icId }}</td>
                        <td>{{ $icdx->icJenisPenyakit }}</td>
                        <td>{{ $icdx->icNamaLokal }}</td>
                        <td>{{ $icdx->icDTD }}</td>
                        <td>{{ $icdx->icSebabSakit }}</td>
                        <td>
                            <a href="{{ route('icdx.edit', $icdx->icId) }}" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <a class="badge bg-danger" onclick="hapusData('icdx', '{{ $icdx->icId }}')"><span
                                    data-feather="trash-2"></span></a>
                            <form id="hapus-icdx-{{ $icdx->icId }}" style="display: none"
                                action="{{ route('icdx.destroy', $icdx->icId) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="my-5 text-center">
                                Data tidak ditemukan.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $dataIcdx->links() }}
        </div>
    </div>
</div>


    @endsection