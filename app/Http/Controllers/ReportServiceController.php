<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inspection;
use PDF;
use Carbon\Carbon;

class ReportServiceController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if ($start_date > $end_date) {
            return redirect()->back()->with('error', 'Tanggal akhir harus lebih besar daripada tanggal awal.');
        }

        $title = 'Trika Klinik | Laporan Layanan';
        $active = 'layanan';

        $dataLayanan = DB::table('inspections')
        ->selectRaw('
            SUBSTRING_INDEX(tindakan, " ", 1) AS nama_layanan,    
            SUBSTRING_INDEX(tindakan, " ", -1) AS harga_layanan, 
            COUNT(tindakan) AS jumlah_layanan, 
            SUM(SUBSTRING_INDEX(tindakan, " ", -1)) AS total_harga')
        ->whereDate('created_at', '>=', date('Y-m-d', strtotime($start_date)))
        ->whereDate('created_at', '<=', date('Y-m-d', strtotime($end_date)))
        ->groupBy('nama_layanan', 'harga_layanan')
        ->orderBy('total_harga', 'desc')
        ->get()
        ->map(function ($data) {
            // Konversi harga_layanan ke tipe data string tanpa desimal dan nol di belakangnya
            $data->harga_layanan = 'Rp. ' . number_format($data->harga_layanan, 0, ',', '.');
            $data->total_harga = 'Rp. ' . number_format($data->total_harga, 0, ',', '.');

            return $data;
        })
        ->toArray();



        return view('home.content.report.service.index', compact('dataLayanan','title','active','start_date'));

        
    }

    public function viewPDF(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $formatted_start_date = Carbon::parse($start_date)->format('d-m-Y');
        $formatted_end_date = Carbon::parse($end_date)->format('d-m-Y');

        $dataLayanan = DB::table('inspections')
            ->selectRaw('tindakan, count(tindakan) as jumlah')
            ->whereDate('created_at', '>=', date('Y-m-d', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime($end_date)))
            ->groupBy('tindakan')
            ->orderBy('jumlah', 'desc')
            ->get()
            ->toArray();

        $array = [];

            foreach($dataLayanan as $data) {
                array_push($array, $data->jumlah);
            }

        $pdf = PDF::loadView('home.content.report.service.report-service', compact('dataLayanan','formatted_start_date','formatted_end_date','array'))
            ->setPaper('a4','portrait');

        return $pdf->stream(); 
    }

    public function downloadPDF(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;


        $formatted_start_date = Carbon::parse($start_date)->format('d-m-Y');
        $formatted_end_date = Carbon::parse($end_date)->format('d-m-Y');

        $dataLayanan = DB::table('inspections')
            ->selectRaw('tindakan, count(tindakan) as jumlah')
            ->whereDate('created_at', '>=', date('Y-m-d', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime($end_date)))
            ->groupBy('tindakan')
            ->orderBy('jumlah', 'desc')
            ->get()
            ->toArray();

        $pdf = PDF::loadView('home.content.report.service.report-service',  compact('dataLayanan'))
            ->setPaper('a4','portrait')
            ->set_option('isRemoteEnabled', true);

        return $pdf->download('data-layanan-pasien-[' . $formatted_start_date . '][' . $formatted_end_date . '].pdf'); 
    }
}
