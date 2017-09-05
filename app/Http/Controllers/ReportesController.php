<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $chartjs = app()->chartjs
		    ->name('barChartTest')
		    ->type('bar')
		    ->size(['width' => 400, 'height' => 200])
		    ->labels(['Label x', 'Label y'])
		    ->datasets([
			    [
				    "label" => "My First dataset",
				    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
				    'data' => [69, 59]
			    ],
			    [
				    "label" => "My First dataset",
				    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
				    'data' => [65, 12]
			    ]
		    ])
		    ->options([]);


	    return view('reportes/rotacion', compact('chartjs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getListadoRotacion(){
        $mes = Input::get('mes');
        $gestion = Input::get('gestion');
        $regional = Input::get('regional');

        if($regional=='')$regional = 'NULL';
        if($mes == ''){
            $gestion= DB::select("SELECT max(gestion) as gestion from contratacion_mensual");
            //dd($gestion[0]->gestion);
            $gestion = $gestion[0]->gestion;
            $mes = DB::select("SELECT max(mes) as mes from contratacion_mensual WHERE gestion= ".$gestion);
            $mes = $mes[0]->mes;
        }
        if($gestion=='')
        {
            $gestion= DB::select("SELECT max(gestion) as gestion from contratacion_mensual");
            $gestion = $gestion[0]->gestion;
        }

        $result = DB::select("call rotacionListado(".$mes.",".$gestion.",".$regional.")");
        return response()->json($result);
    }

    public function getYear(){
        $result = DB::select("select distinct gestion from contratacion_mensual");
        return response()->json($result);
    }
}
