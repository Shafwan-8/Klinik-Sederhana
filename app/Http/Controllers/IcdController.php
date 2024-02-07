<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IcdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('home.content.pemeriksaan.tambah', request('pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Icd $icd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Icd $icd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Icd $icd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Icd $icd)
    {
        //
    }

    public function action(Request $request)
    {
        $data = Icd::first();
        if ($request->ajax()){

            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Icd::where('icJenisPenyakit', 'like', '%' .$query. '%')
                    // ->orWhere('icId', 'like', '%' .$query. '%')
                    // ->orWhere('icNamaLokal', 'like', '%' .$query. '%')
                    // ->orWhere('icSebabSakit', 'like', '%' .$query. '%')
                    ->orderBy('icId', 'asc')
                    ->take(10)
                    ->get();
            } else {
                $data = Icd::orderBy('id', 'asc')
                ->take(10)
                ->get();
            }

            $total_data = $data->count();
            if ($total_data > 0 ){

                foreach($data as $key => $row) {
                    $output .= '
                        <input class="form-check-input d-flex flex-row" type="radio" name="diagnosa" id="diagnosa_'.$key.'" value="'.$row->icJenisPenyakit.'"> 
                        <label class="form-check-label" for="diagnosa_'.$key.'">'.$row->icJenisPenyakit.'</label> <br>
                    ';
                }
            } else {
                $output = '
                <b>
                    Data tidak ditemukan...
                </b>
                ';
            }

            $data = array(
                'table_data' => $output
            );

            echo json_encode($data);

        }
    }

    public function actionLainnya(Request $request)
    {
        $data = Icd::first();
        if ($request->ajax()){

            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Icd::where('icJenisPenyakit', 'like', '%' .$query. '%')
                    // ->orWhere('icId', 'like', '%' .$query. '%')
                    // ->orWhere('icNamaLokal', 'like', '%' .$query. '%')
                    // ->orWhere('icSebabSakit', 'like', '%' .$query. '%')
                    ->orderBy('icId', 'asc')
                    ->take(10)
                    ->get();
            } else {
                $data = Icd::orderBy('id', 'asc')
                ->take(10)
                ->get();
            }

            $total_data = $data->count();
            if ($total_data > 0 ){

                foreach($data as $key => $row) {
                    $output .= '
                        <input class="form-check-input d-flex flex-row" type="checkbox" name="diagnosa_lainnya[]" id="diagnosa_lainnya[]" value="'.$row->icJenisPenyakit.'"> 
                        <label class="form-check-label" for="diagnosa_lainnya[]">'.$row->icJenisPenyakit.'</label> <br>
                    ';
                }
            } else {
                $output = '
                <b>
                    Data tidak ditemukan...
                </b>
                ';
            }

            $data = array(
                'table_data' => $output
            );

            echo json_encode($data);

        }
    }
}
