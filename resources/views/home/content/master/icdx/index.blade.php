@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Daftar ICDX</h1>
</div>



@endsection

@section('container')
<div class="card">
    <div class="my-3 mx-3">

        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                      <th>#</th>
                      <th>Nama Diagnosa</th>
                      <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    {{-- @forelse ($dataDiagnosa as $diagnosa)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $diagnosa->diagnosa }}</td>
                            <td>{{ $diagnosa->jumlah }}</td>
                        </tr> --}}
                    {{-- @empty
                        <tr>
                            <td colspan="6">
                                <div class="my-5 text-center">
                                    Data tidak ditemukan.
                                </div>
                            </td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>



@endsection