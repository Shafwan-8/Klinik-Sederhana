@extends('home.dashboard.layouts.index')

@section('jsChart')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
@endsection

@section('title')
<h3>Grafik Diagnosa</h3>
@endsection

@section('container')
    <form action="{{ route('grafik.diagnosa') }}" method="GET">
        <div class="row">
            <div class="col-sm-2">
                <select name="tahun" class="form-control">
                    @for($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ $tahun==$i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-sm-2">
                <select name="bulan" class="form-control">
                    <option value="">Pilih Bulan</option>
                    @for($i = 1; $i <= 12; $i++) <option value="{{ $i }}" {{ $bulan==$i ? 'selected' : '' }}>{{ date('F', mktime(0,
                        0, 0, $i, 1)) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-sm-2">
                <button class="ladda-button btn btn-secondary btn-square btn-ladda" data-style="contract">
                    <span class="ladda-label">Filter</span>
                    <span class="ladda-spinner"></span>
                </button>
            </div>
        </div>
    </form>


    @if($tahun)
        <canvas id="diagnosaChart" width="400" height="200" class="mt-5"></canvas>
    @else
        <h3 class="text-center mt-100 mb-100">Harap memilih tahun atau bulan terlebih dahulu</h3>    
    @endif
@endsection

@section('footerJs')
    var ctxDiagnosa = document.getElementById('diagnosaChart').getContext('2d');
    var myDiagnosaChart = new Chart(ctxDiagnosa, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasets) !!}
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Langkah sumbu Y
                    }
                }
            }
        }
    });
@endsection