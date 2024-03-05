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
            <div class="card-body">
            <canvas id="dashboardChart" width="350" height="150" class=""></canvas>
        </div>
        </div>
    </div>
    <div class="col mt-4 ">
        <div class="card">
            <div class="card-header">
                <div class="h6">Riwayat Login</div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($historyLogin as $history)
                    <div class="col-6 col-sm-4 mb-3">
                        <div class="card">
                            <div class="d-flex justify-content-end p-0 m-0">
                                @if ($history->role == 'admin')
                                <span class="badge badge-info">{{ $history->role }}</span>
                                @else
                                <span class="badge badge-primary">{{ $history->role }}</span>
                                @endif
                            </div>
                            <div class="mx-4 pb-3">
                                <div class="row">
                                    @if ($history->foto == null)
                                    <img src="{{ asset('img/default-profile.jpg') }}" style="width: auto; height: 50px" class="rounded-lg mx-2" alt="User-image">
                                    @else
                                    <img src="{{ asset('storage/' . $history->foto) }}" style="width: auto; height: 50px" class="rounded-lg mx-2" alt="User-image">
                                    @endif
                                    <div class="col p-0 align-self-center">
                                        <p class="text-wrap">{{ $history->nama }}</p>
                                        <p class="text-muted"><small>{{ $history->created_at->diffForHumans() }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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