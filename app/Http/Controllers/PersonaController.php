<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return view('personas/index');
    }

	public function getTasks()
	{
		$persona = Persona::select('*');

		return Datatables::of($persona)->addColumn('action', function ($persona) {
			return '<a href="#edit-'.$persona->documento.'" class="btn btn-icon-toggle" style="background: #ffc107"><i class="fa fa-pencil" style="color: white" ></i></a>';
		})->make(true);
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
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'paterno' => 'required',
		]);

		if ($validator->fails()) {
			$status = FALSE;
			$message = $validator->errors();
		} else {
			$persona = new Persona();
			$persona ->nombres = strtoupper($request->name);
			$persona ->paterno = strtoupper($request->paterno);
			$persona ->materno = strtoupper($request->materno);
			$persona ->documento = $request->ci;
			$persona ->ap_casada = strtoupper($request->casada);
			$persona ->regional = strtoupper($request->regional);
			$persona ->fechanacimiento = $request->birthDate;
			$persona ->nacionalidad = strtoupper($request->nacionalidad);
			$persona ->genero = $request->genero;
			$persona ->id = md5(trim(strtoupper($request->regional).strtoupper($request->paterno).strtoupper($request->materno).strtoupper($request->casada).strtoupper($request->name)));
			$acct = $persona->save();
			if( !$acct )
			{
				$status=FALSE;
				$message='Ocurrió un error inesperado, inténtelo más tarde';
			} else {
				// Else commit the queries
				$status=TRUE;
				$message='Se registro la person de forma exitosa';
			}

		}
		return response()->json([
			'status' => $status,
			'message' => $message,
		]);
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

    public function edit($id)
    {
	    $persona = Persona::where('documento', $id)->get();
	    return response()->json($persona);
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
	    $validator = Validator::make($request->all(), [
		    'name' => 'required',
		    'paterno' => 'required',
	    ]);

	    if ($validator->fails()) {
		    $status = FALSE;
		    $message = $validator->errors();
	    } else {
		    $persona = Persona::where('documento', $id)->first();
		    $persona ->nombres = strtoupper($request->name);
		    $persona ->paterno = strtoupper($request->paterno);
		    $persona ->materno = strtoupper($request->materno);
		    $persona ->documento = $request->ci;
		    $persona ->ap_casada = strtoupper($request->casada);
		    $persona ->regional = strtoupper($request->regional);
		    $persona ->fechanacimiento = $request->birthDate;
		    $persona ->nacionalidad = strtoupper($request->nacionalidad);
		    $persona ->genero = $request->genero;
		    $persona ->id = md5(trim(strtoupper($request->regional).strtoupper($request->paterno).strtoupper($request->materno).strtoupper($request->casada).strtoupper($request->name)));
		    $acct = $persona->save();
		    if( !$acct )
		    {
			    $status=FALSE;
			    $message='Ocurrió un error inesperado, inténtelo más tarde';
		    } else {
			    // Else commit the queries
			    $status=TRUE;
			    $message='Se registro la person de forma exitosa';
		    }

	    }
	    return response()->json([
		    'status' => $status,
		    'message' => $message,
	    ]);
    }

    public function getExcelPerson($id){
        $person = $query = DB::table('aux_excel')
            ->select('*')
            ->where('id',$id)->first();
        if(! is_null($person->nombre_completo)){
            $nombres = explode(' ', $person->nombre_completo);
            $person->paterno = $nombres[0];
            unset($nombres[0]);
            $person->materno = $nombres[1];
            unset($nombres[1]);
            $names = implode(' ',$nombres);
            $person->nombres = $names;
        }
        return response()->json($person);
    }



    public function Ajax_Jaro($id_excel){
        $result = DB::select("call similitud(".$id_excel.")");
        return response()->json($result);
    }

    public function correctPerson(){
        $documento = Input::get('documento');
        $idExcel = Input::get('id_excel');
        $persona = Persona::where('documento', $documento)->first();
        return response()->json($person);
	        if (DB::table('aux_excel')->where('id',$idExcel)->update(['id_persona'=> $id, 'documento'=>$documento, 'matched'=>1])){
		        $status=TRUE;
		        $message='Correccion Exitosa';
	        }
	        else{
		        $status=FALSE;
		        $message='Ocurrió un error inesperado, inténtelo más tarde';
	        }
	    return response()->json([
		    'status' => $status,
		    'message' => $persona,
	    ]);
    }

}
