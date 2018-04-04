<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use App\altasBajas;
use App\Gestion;

/**
 * Class RotacionController
 * @package App\Http\Controllers
 */
class RotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::select("SET lc_time_names = 'es_ES'");
        $date= DB::select("SELECT (date_format(max(inicio), '%M %Y')) as fecha  FROM gestion");
        $fecha = ucwords($date[0]->fecha);
        return view('Contratacion/altasBajas',compact('fecha'));
    }


    public function getTable(Request $request)
    {
        $inicio = Gestion::max('id');
        $fin = Gestion::max('id');
        //$inicio=2;
        //$fin = 2;
        $rot=[];
        $datatables =  app('datatables')->of($rot);

        if ($ini = strtolower($datatables->request->get('inicio'))) {
            DB::select("SET lc_time_names = 'es_ES'");
            $init = DB::select("SELECT id  FROM gestion where date_format(inicio, '%M %Y') ='". $ini ."'");
            $inicio = $init[0]->id;
        }
        if ($fn = strtolower($datatables->request->get('fin'))) {
            DB::select("SET lc_time_names = 'es_ES'");
            $final= DB::select("SELECT id  FROM gestion where date_format(inicio, '%M %Y') ='". $fn ."'");
            $fin = $final[0]->id;
        }
        for ($i=$inicio;$i<=$fin;$i++) {
            $rot =array_merge($rot, DB::select("call RotacionContratacion(".$i.")"));
        }
        $rot= altasBajas::hydrate($rot);
        if ($reg= $datatables->request->get('regional')) {
            $rot = $rot->whereIn('regional', $reg);
        }

        if ($tipo= $datatables->request->get('tipo')) {
            $rot = $rot->whereIn('tipo',$tipo);
        }

        $datatables =  app('datatables')->of($rot);
        return $datatables->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rotacion = DB::select("call RotacionContratacion(".$id.")");
        dd ($rotacion);
    }


}
