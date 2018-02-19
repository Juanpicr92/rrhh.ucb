<?php

namespace App\Http\Controllers;

use App\Rotacion;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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

	    $years = DB::select( 'SELECT  DISTINCT gestion from rotacion;');
	    $years = collect($years)->toArray();
	    foreach ($years as $year){
		    $irp = Rotacion::where(['regional'=> 'LA PAZ','gestion'=>$year->gestion])->orderBy('mes','ASC')->get()->toArray();
		    foreach ($irp as $value){
		    	$set[$year->gestion][$value['mes']-1]=$value['IRP'];
		    }
	    }
	    $chartjs = app()->chartjs
		    ->name('lineChartTest')
		    ->type('line')
		    ->size(['width' => 400, 'height' => 200])
		    ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'])
		    ->datasets([
			    [
				    "label" => "2015",
				    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
				    'borderColor' => "rgba(38, 185, 154, 0.7)",
				    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
				    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
				    "pointHoverBackgroundColor" => "#fff",
				    "pointHoverBorderColor" => "rgba(220,220,220,1)",
				    'data' => $set[2015],
			    ],
			    [
				    "label" => "2016",
				    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
				    'borderColor' => "rgba(38, 185, 154, 0.7)",
				    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
				    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
				    "pointHoverBackgroundColor" => "#fff",
				    "pointHoverBorderColor" => "rgba(220,220,220,1)",
				    'data' => $set[2016],
			    ],
			    [
				    "label" => "2017",
				    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
				    'borderColor' => "rgba(38, 185, 154, 0.7)",
				    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
				    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
				    "pointHoverBackgroundColor" => "#fff",
				    "pointHoverBorderColor" => "rgba(220,220,220,1)",
				    'data' => $set[2017],
			    ]

		    ])
		    ->options([]);
		//dd($chartjs);

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
            $gestion= DB::select("SELECT max(gestion) as gestion from experiencialaboral");
            //dd($gestion[0]->gestion);
            $gestion = $gestion[0]->gestion;
            $mes = DB::select("SELECT max(mes) as mes from experiencialaboral WHERE gestion= ".$gestion);
            $mes = $mes[0]->mes;
        }
        if($gestion=='')
        {
            $gestion= DB::select("SELECT max(gestion) as gestion from experiencialaboral");
            $gestion = $gestion[0]->gestion;
        }
	    if ($regional === 'NULL'){
		    $result = DB::select("call rotacionListado(".$mes.",".$gestion.",".$regional.")");
	    }else{
		    $result = DB::select("call rotacionListado(".$mes.",".$gestion.",'".$regional."')");
	    }
        return response()->json($result);
    }

    public function getYear(){
        $result = DB::select("select distinct gestion from experiencialaboral");
        return response()->json($result);
    }
}
