<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\ImportExcel;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    //
    public function importExport()

    {

        return view('importExport');

    }

    public function downloadExcel($type)

    {

        $data = Item::get()->toArray();

        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }

    public function importExcel()

    {

        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {

            })->get();

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {

                    $insert[] = [
                                    'documento' => $value->documento,
                                    'nombre_completo' => $value->nombre_completo,
                                    'paterno' => $value->paterno,
                                    'materno' => $value->materno,
                                    'ap_casada' => $value->ap_casada,
                                    'nombres' => $value->materno,
                                    'mes' => $value->mes,
                                    'gestion' => $value->gestion,
                                    'admn' => $value->adm,
                                    'acad' => $value->acad,
                                ];

                }

                if(!empty($insert)){

                    DB::table('aux_excel')->insert($insert);

                    dd('Insert Record successfully.');

                }

            }

        }

        return back();

    }
}
