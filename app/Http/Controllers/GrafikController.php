<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class GrafikController extends Controller
{
    public function graphDiagnosis(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // Initialize arrays for labels and data
        $labels = [];
        $data = [];
        $colors = ['#f56954'];

        // If only year is selected, loop through each month
        if (!$bulan) {
            for ($i = 1; $i <= 12; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $count = Inspection::whereYear('created_at', $tahun)
                                    ->whereMonth('created_at', $i)
                                    ->count('diagnosa');

                $labels[] = $monthName;
                $data[] = $count;
            }
        } else {
            // Loop through each day of the selected month
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);
                $count = Inspection::whereDate('created_at', $date)->count();

                // Format date as desired, here we're using day number
                $labels[] = $day;
                $data[] = $count;
            }
        }

        // Define dataset
        $datasets = [
            [
                'label' => 'Diagnosa',
                'backgroundColor' => $colors,
                'data' => $data
            ]
        ];
// Pass data to view
$title = 'Trika Klinik | Grafik Diagnosa';
        $active = 'graph-diagnosis';

        return view('home.content.grafik.grafik-diagnosis', compact('labels', 'datasets', 'title', 'active'))
        ->with('tahun', $tahun)
            ->with('bulan', $bulan);
    }
    
    public function graphService(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // Initialize arrays for labels and data
        $labels = [];
        $data = [];
        $colors = ['#f56954'];

        // If only year is selected, loop through each month
        if (!$bulan) {
            for ($i = 1; $i <= 12; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $count = Inspection::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->count('tindakan');
                
                $labels[] = $monthName;
                $data[] = $count;
            }
        } else {
            // Loop through each day of the selected month
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);
                $count = Inspection::whereDate('created_at', $date)->count();
                
                // Format date as desired, here we're using day number
                $labels[] = $day;
                $data[] = $count;
            }
        }
        
        // Define dataset
        $datasets = [
            [
                'label' => 'Layanan',
                'backgroundColor' => $colors,
                'data' => $data
            ]
        ];

        // Pass data to view
        $title = 'Trika Klinik | Grafik Layanan';
        $active = 'graph-service';

        return view('home.content.grafik.grafik-service', compact('labels', 'datasets', 'title', 'active'))
            ->with('tahun', $tahun)
            ->with('bulan', $bulan);
    }

    public function graphTransaction(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // Initialize arrays for labels and data
        $labels = [];
        $data = [];
        $colors = ['#f56954'];

        // If only year is selected, loop through each month
        if (!$bulan) {
            for ($i = 1; $i <= 12; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $totalHarga = Inspection::whereYear('created_at', $tahun)
                                        ->whereMonth('created_at', $i)
                                        ->sum('harga_tindakan');

                $labels[] = $monthName;
                $data[] = $totalHarga;
            }
        } else {
            // Loop through each day of the selected month
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = sprintf('%04d-%02d-%02d', $tahun, $bulan, $day);
                $totalHarga = Inspection::whereDate('created_at', $date)->sum('harga_tindakan');

                // Format date as desired, here we're using day number
                $labels[] = $day;
                $data[] = $totalHarga;
            }
        }

        // Define dataset
        $datasets = [
            [
                'label' => 'Harga Transaksi',
                'backgroundColor' => $colors,
                'data' => $data
            ]
        ];

        // Pass data to view
        $title = 'Trika Klinik | Grafik Harga Transaksi';
        $active = 'graph-transaction';

        return view('home.content.grafik.grafik-transaction', compact('labels', 'datasets', 'title', 'active'))
            ->with('tahun', $tahun)
            ->with('bulan', $bulan);
    }

}
