<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\aux_excel;
use App\ImportExcel;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

use Yajra\Datatables\Datatables;

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

    public function getAuxImport(){
        $persona = aux_excel::select(['id','documento','paterno','materno','ap_casada','nombres','nombre_completo', 'mes','gestion','admn','acad']);

        return Datatables::of($persona)

            ->make(true);
    }

    public function importExcel()

    {

        if(Input::hasFile('file')){

            $path = Input::file('file')->getRealPath();

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
                                    'admn' => $value->admn,
                                    'acad' => $value->acad,
                                ];

                }

                if(!empty($insert)){

                    DB::table('aux_excel')->insert($insert);

                    dd('Insert Record successfully.');

                }

            }

        }

        else{dd('Insert Record successfully.');}

        return back();

    }
}
