@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Dokter</h1>
</div>

@endsection

@section('container')
<div class="card">
    @if (auth()->user()->role == 'admin')
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
                class="btn btn-dark"
                href="{{ route('dokter.create') }}"
            >Tambah</a>
        </div>
    @endif
        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>No KTP</th>
                      <th>No HP</th>
                      <th>SIP</th>
                      <th>Foto</th>
                    @if (auth()->user()->role == 'admin')
                      <th>Action</th>
                    @endif
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse ($dokters as $dokter)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->no_ktp }}</td>
                            <td>{{ $dokter->no_hp }}</td>
                            <td>{{ $dokter->sip }}</td>
                            <td>
                                @if ($dokter->foto)
                                    <img
                                        class="rounded" 
                                        height="40"
                                        width="50"
                                        src="{{ asset('storage/' . $dokter->foto) }}"
                                        alt="Foto {{ $dokter->nama }}"
                                    />
                                @endif
                            </td>
                        @if (auth()->user()->role == 'admin')
                            <td>
                                <a href="{{ route('dokter.show', $dokter->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="{{ route('dokter.edit', $dokter->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <a class="badge bg-danger" onclick="hapusData('dokter', '{{ $dokter->id }}')"><span data-feather="trash-2"></span></a>
                                <form
                                    id="hapus-dokter-{{ $dokter->id }}"
                                    style="display: none"
                                    action="{{ route('dokter.destroy', $dokter->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        @endif
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
    </div>



@endsection