@extends('home.dashboard.layouts.index')

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Data Layanan Pasien</h1>
</div>

<div class="p-0 d-flex justify-content-end px-3 py-2">
    <form action="{{ route('download-pdf-service') }}" method="post" target="__blank">
        @csrf
            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
            <button type="submit" class="btn btn-primary @if($start_date == null) disabled  @endif" @if($start_date == null) disabled  @endif>Download PDF</button>
    </form>

    <form action="{{ route('view-pdf-service') }}" method="post" target="__blank" class="ml-2">
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
        <form method="get" action="{{ route('report.service') }}">
            <div class="row pb-3">
                <div class="col-md-4">
                    <label> Tanggal Awal :</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" required>
                </div>

                <div class="col-md-4">
                    <label> Tanggal Akhir :</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" required>
                </div>

                <div class="col-md-3 py-4">
                <button class="ladda-button btn btn-primary btn-square btn-ladda" data-style="contract">
                    <span class="ladda-label">Filter</span>
                    <span class="ladda-spinner"></span>
                </button>
                </div>
            </div>
        </form>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-active text-center">
                    <tr>
                      <th>#</th>
                      <th>Nama Layanan</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse ($dataLayanan as $tindakan)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tindakan->nama_layanan }}</td>
                            <td>{{ $tindakan->jumlah_layanan }}</td>
                            <td>{{ $tindakan->harga_layanan }}</td>
                            <td>{{ $tindakan->total_harga }}</td>
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