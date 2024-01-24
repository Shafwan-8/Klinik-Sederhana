@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Pasien</h1>
</div>

@endsection

@section('container')
<div class="card">
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
                class="btn btn-dark"
                href="{{ route('patient.create') }}"
            >Tambah</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                      <th>#</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>No HP</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse ($patients as $patient)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->nik_numb }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->date_birth }}</td>
                            <td>{{ $patient->hp_numb }}</td>
                            <td>
                                <a href="{{ route('patient.show', $patient->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="{{ route('patient.edit', $patient->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <a class="badge bg-danger" onclick="hapusData('patient', '{{ $patient->id }}')"><span data-feather="trash-2"></span></a>
                                <form
                                    id="hapus-patient-{{ $patient->id }}"
                                    style="display: none"
                                    action="{{ route('patient.destroy', $patient->id) }}"
                                    method="post"
                                >
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
    </div>



@endsection