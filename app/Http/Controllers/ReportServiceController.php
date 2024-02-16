<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inspection;
use Barryvdh\DomPDF\Facade\Pdf;
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

        // Menentukan pola ekspresi reguler
        $pattern = '/^(.*?)\s+(\d+)$/';

        $dataLayanan = DB::table('inspections')
        ->selectRaw('
            tindakan as nama_layanan,
            harga_tindakan as harga_layanan,
            COUNT(tindakan) as jumlah_layanan,
            SUM(harga_tindakan) as total_harga')
        ->whereDate('created_at', '>=',  date('Y-m-d H:i:s', strtotime($start_date)))
        ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
        ->groupBy('nama_layanan', 'harga_layanan')
        ->orderByDesc('total_harga')
        ->get()
        ->map(function ($item) {
            $item->harga_layanan = 'Rp ' . number_format((float)$item->harga_layanan, 0, ',', '.');
            $item->total_harga = 'Rp ' . number_format((float)$item->total_harga, 0, ',', '.');
            return $item;
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
        ->selectRaw('
            tindakan as nama_layanan,
            harga_tindakan as harga_layanan,
            COUNT(tindakan) as jumlah_layanan,
            SUM(harga_tindakan) as total_harga')
        ->whereDate('created_at', '>=',  date('Y-m-d H:i:s', strtotime($start_date)))
        ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
        ->groupBy('nama_layanan', 'harga_layanan')
        ->orderByDesc('total_harga')
        ->get()
        ->map(function ($item) {
            $item->harga_layanan = 'Rp ' . number_format((float)$item->harga_layanan, 0, ',', '.');
            $item->total_harga = 'Rp ' . number_format((float)$item->total_harga, 0, ',', '.');
            return $item;
        })
        ->toArray();

        // $array = [];

        //     foreach($dataLayanan as $data) {
        //         array_push($array, $data->jumlah);
        //     }

        $pdf = PDF::loadView('home.content.report.service.report-service', compact('dataLayanan','formatted_start_date','formatted_end_date'))
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
        ->selectRaw('
            tindakan as nama_layanan,
            harga_tindakan as harga_layanan,
            COUNT(tindakan) as jumlah_layanan,
            SUM(harga_tindakan) as total_harga')
        ->whereDate('created_at', '>=',  date('Y-m-d H:i:s', strtotime($start_date)))
        ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
        ->groupBy('nama_layanan', 'harga_layanan')
        ->orderByDesc('total_harga')
        ->get()
        ->map(function ($item) {
            $item->harga_layanan = 'Rp ' . number_format((float)$item->harga_layanan, 0, ',', '.');
            $item->total_harga = 'Rp ' . number_format((float)$item->total_harga, 0, ',', '.');
            return $item;
        })
        ->toArray();

        $pdf = PDF::loadView('home.content.report.service.report-service',  compact('dataLayanan','formatted_start_date','formatted_end_date'))
            ->setPaper('a4','portrait')
            ->set_option('isRemoteEnabled', true);

        return $pdf->download('data-layanan-pasien-[' . $formatted_start_date . '][' . $formatted_end_date . '].pdf'); 
    }
}
