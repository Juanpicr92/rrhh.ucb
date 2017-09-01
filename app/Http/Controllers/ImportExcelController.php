<?php


namespace App\Http\Controllers;
ini_set('max_execution_time',600);

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
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
        $persona = aux_excel::select(['id','documento','paterno','materno','ap_casada','nombres','nombre_completo','admn','acad','matched']);
	    return Datatables::of($persona)->make(true);
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
                                    'acad' => $value->acad
                                ];

                }

                if(!empty($insert)){

                    DB::table('aux_excel')->insert($insert);

                    $result = DB::select("call matchExcel");

                }

            }

        }

        else{dd('Insert Record successfully.');}

        return back();

    }

    public function setGestionMes(Request $request){
        $mes = $request->mes;
        $gestion = $request->gestion;
        $regional = $request->regional;
        DB::table('aux_excel')
            ->update(['mes'=>$mes, 'gestion'=>$gestion, 'regional'=>$regional]);
        return response()->json('{info: "success "}');
    }


    public function verificarmatched( Request $request){
        $result = DB::table('aux_excel')->where('matched', '0')->get();
        $total = count($result);
        if($total>0) {
            return response()->json('{info: "fail"}');
        }
        else return response()->json('{info: "success"}');
    }

    public function finishExcel(){
        DB::select("INSERT  into PLANILLAS (ci, nombre_completo, paterno, materno, ap_casada, nombres, regional, mes, gestion, is_adm, is_acad) select documento, nombre_completo, paterno, materno, ap_casada,nombres, regional, mes,gestion,admn, acad from aux_excel");
        return response()->json('{info: "success"}');
    }
}
