<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
			return '<a href="#edit-'.$persona->documento.'" class="btn btn-icon-toggle" style="background: #0aa89e"><i class="fa fa-pencil" style="color: white" ></i></a>';
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
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		// process the login
		if ($validator->fails()) {
			return Redirect::to('persona/index')
			               ->withErrors($validator);
		} else {
			// store
			$nerd = new Persona();
			$nerd->nombres = Input::get('name');
			$nerd->id = '1234';
			$birth = Input::get('birthDate');
			$parts = explode('/',$birth);
			$date = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
			$nerd->fechanacimiento =$date;
			$nerd->save();
			// redirect
			Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('persona');
		}
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
}
