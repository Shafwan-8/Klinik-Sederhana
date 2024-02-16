<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function action(Request $request)
    {       
        $data = Service::first();
        if ($request->ajax()){

            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Service::where('name', 'like', '%' .$query. '%')
                    ->orderBy('id', 'asc')
                    ->take(10)
                    ->get();
            } else {
                $data = Service::orderBy('id', 'asc')
                ->take(10)
                ->get();
            }

            $total_data = $data->count();
            if ($total_data > 0 ){

                foreach($data as $key => $row) {
                    $output .= '
                        <input class="form-check-input" type="radio" name="tindakan" id="tindakan_'.$key.'" value="'.$row->name.'" harga="'.$row->rates.'">
                        <label class="form-check-label" for="tindakan_'.$key.'">'.$row->name. '</label> <br>

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
        $data = Service::first();
        if ($request->ajax()){

            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Service::where('name', 'like', '%' .$query. '%')
                    ->orderBy('id', 'asc')
                    ->take(10)
                    ->get();
            } else {
                $data = Service::orderBy('id', 'asc')
                ->take(10)
                ->get();
            }

            $total_data = $data->count();
            if ($total_data > 0 ){

                foreach($data as $key => $row) {
                    $output .= '
                        <input class="form-check-input d-flex flex-row" type="checkbox" name="tindakan_lainnya[]" id="tindakan_lainnya[]" value="'.$row->name. ' ' .$row->rates.'">
                        <label class="form-check-label" for="tindakan_lainnya[]">'.$row->name. ' Rp.' .$row->rates.'</label> <br>

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
