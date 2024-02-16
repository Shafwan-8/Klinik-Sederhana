@extends('home.dashboard.layouts.index')

@section('title')
{{ auth()->user()->dokter->first()->id }}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Data Diagnosa Pasien</h1>
</div>

{{-- @if($start_date == null ) 
<div class="p-0 d-flex justify-content-end px-3 py-2">
    <small>Harap memilih tanggal dahulu untuk download PDF</small>
</div>
@else
@endif --}}
<div class="p-0 d-flex justify-content-end px-3 py-2">
    <a class="btn btn-secondary" href="{{ route('graphic.diagnosis') }}">Grafik</a>

    <form action="{{ route('download-pdf-diagnosis') }}" method="post" target="__blank" class="ml-2">
        @csrf
            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
            <button type="submit" class="btn btn-primary @if($start_date == null) disabled  @endif" @if($start_date == null) disabled  @endif>Download PDF</button>
    </form>

    <form action="{{ route('view-pdf-diagnosis') }}" method="post" target="__blank" class="ml-2">
        @csrf
            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
            <button class="btn btn-success @if($start_date == null) disabled  @endif" @if($start_date == null) disabled  @endif>View PDF</button>
    </form>
</div>


@endsection

@section('container')
<div class="card">
    <div class="my-3 mx-3">
        <form method="get" action="{{ route('report.diagnosis') }}">
            <div class="row pb-3">
                <div class="col-md-4">
                    <label> Tanggal Awal :</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label> Tanggal Akhir :</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>

                <div class="col-md-3 py-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        </div>

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
                    @forelse ($dataDiagnosa as $diagnosa)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $diagnosa->diagnosa }}</td>
                            <td>{{ $diagnosa->jumlah }}</td>
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