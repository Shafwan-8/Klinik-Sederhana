<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inspection;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportDiagnosaController extends Controller
{
    
    public function index(Request $request)
    {
        $idDokter = $this->getIdDokterYangLogin();
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if ($start_date > $end_date) {
            return redirect()->back()->with('error', 'Tanggal akhir harus lebih besar daripada tanggal awal.');
        }

        $title = 'Trika Klinik | Laporan Diagnosa';
        $active = 'diagnosa';

        $dataDiagnosa = DB::table('inspections')
            ->selectRaw('diagnosa, count(diagnosa) as jumlah')
            ->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
            ->groupBy('diagnosa')
            ->orderBy('jumlah', 'desc')
            ->get()
            ->toArray();
            
        return view('home.content.report.diagnosis.index', compact('dataDiagnosa','title','active','start_date', 'idDokter'));
    }

    public function viewPDF(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $formatted_start_date = Carbon::parse($start_date)->format('d-m-Y');
        $formatted_end_date = Carbon::parse($end_date)->format('d-m-Y');

        $dataDiagnosa = DB::table('inspections')
            ->selectRaw('diagnosa, count(diagnosa) as jumlah')
            ->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
            ->groupBy('diagnosa')
            ->orderBy('jumlah', 'desc')
            ->get();

        $array = [];

            foreach($dataDiagnosa as $data) {
                array_push($array, $data->jumlah);
            }

        $pdf = PDF::loadView('home.content.report.diagnosis.report-diagnosis', compact('dataDiagnosa','formatted_start_date','formatted_end_date', 'array'))
            ->setPaper('a4','portrait');

        return $pdf->stream(); 
    }

    public function downloadPDF(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $formatted_start_date = Carbon::parse($start_date)->format('d-m-Y');
        $formatted_end_date = Carbon::parse($end_date)->format('d-m-Y');

        $dataDiagnosa = DB::table('inspections')
            ->selectRaw('diagnosa, count(diagnosa) as jumlah')
            ->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime($start_date)))
            ->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime($end_date)))
            ->groupBy('diagnosa')
            ->orderBy('jumlah', 'desc')
            ->get()
            ->toArray();

        $pdf = PDF::loadView('home.content.report.diagnosis.report-diagnosis', compact('dataDiagnosa','formatted_start_date','formatted_end_date'))
            ->setPaper('a4','portrait')
            ->set_option('isRemoteEnabled', true);

        return $pdf->download('data-diagnosa-pasien-[' . $formatted_start_date . '][' . $formatted_end_date . '].pdf'); 
    }
}
