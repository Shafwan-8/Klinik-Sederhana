@extends('home.dashboard.layouts.index')

@section('jsChart')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
@endsection

@section('content_dashboard')
<div class="row text-dark">
    <div class="col col-4">
        <div class="card mx-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="h6">Jumlah Dokter Aktif</div>
                    <span class="badge d-flex align-items-center badge-info">
                        Total
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h2 class="text-center">{{ $dokter }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-4">
        <div class="card mx-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="h6">Jumlah Pasien</div>
                    <span class="badge d-flex align-items-center badge-info">
                        Total
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h2 class="text-center">{{ $pasien }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-4">
        <div class="card mx-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="h6">Jumlah Pemeriksaan</div>
                    <span class="badge d-flex align-items-center badge-info">
                        Total
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h2 class="text-center">{{ $pemeriksaan }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-12 mt-4 ">
        <div class="card">
            <canvas id="dashboardChart" width="350" height="150" class="mt-5"></canvas>
        </div>
    </div>
</div>

@endSection

@section('container')
    <div id="toaster"></div>
@endSection

@section('footerJs')
    var ctxDashboard = document.getElementById('dashboardChart').getContext('2d');
    var myDashboardChart = new Chart(ctxDashboard, {
        type: 'bar',
        data: {
            labels: {!! json_encode($grafikDashboard['labels']) !!},
            datasets: {!! json_encode($grafikDashboard['datasets']) !!}
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