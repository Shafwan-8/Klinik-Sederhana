@extends('home.dashboard.layouts.index')

@section('jsChart')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
@endsection

@section('title')
<h3>Grafik Laporan Diagnosa <span id="copy-year"></span></h3>

<div class="p-0 d-flex justify-content-end px-3 py-2">
    <a class="btn btn-secondary" href="{{ route('report.diagnosis') }}">Kembali</a>
</div>
@endsection

@section('container')
    
    
    <div style="width: 900px; margin: auto;">
        <canvas id="chart"></canvas>
    </div>
    
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
            var userChart = new Chart(ctx, {
                type:'bar',
                data:{
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
                options: {
                    scales: {
                        x: {
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            })
        </script>


@endsection