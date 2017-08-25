@extends('layouts.admin')

@section('content')

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content card" style="padding: 30px">
				<h2>Registro de Restaurantes</h2>
				<div class="col-md-12 form" role="form">
					{!! Form::open(['action'=>'PersonaController@store','files'=>true, 'method'=>'POST']) !!}
					<div class="form-group floating-label {{ $errors->has('name') ? 'has-error' : ''}}">
						{!! Form::text('name',null,['id'=>'name', 'name'=>'name', 'class'=>'form-control', 'value'=>"{{ old('name') }}"]) !!}
						{!! Form::label('Nombre:') !!}
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								{!! Form::text('birthDate',null,['id'=>'birthDate', 'name'=>'birthDate', 'class'=>'form-control']) !!}
								<label>Datepicker</label>
							</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div><!--end .form-group -->
					<?php  ?>
					{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
					<?php ?>
					{!! Form::close() !!}
					<button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-dismiss="modal" style="background: #0aa89e;color: #FFFFFF;position:absolute;right:20px;bottom:-55px"><i class="md md-close"></i></button>
				</div>
			</div>
		</div>
	</div>

	<section class="card col-md-11 col-md-offset-1  style-default-bright" style="margin-top: 10px;margin-left: 1%;width: 98%;">
		<div class="section-body">
			<h2 class="text-primary">Listado de Personal</h2>
			<table id="task" class="table table-hover" style="width: 99%;font-size: smaller;">
				<thead>
				<tr>
					<th>Regional</th>
					<th>CI</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Casada</th>
					<th>Nombres</th>
					<th>Genero</th>
					<th>Nacionalidad</th>
					<th>Fecha Nacimiento</th>
					<th>Acciones</th>
				</tr>
				</thead>
			</table>
				<button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-toggle="modal" style="background: #0aa89e;color: #FFFFFF;position:absolute;top:33px; left:240px;" data-target="#myModal"><i class="md md-add"></i></button>
			</div><!--end .section-body -->
	</section>


	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#task').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "{{ route('datatable.tasks') }}",
				"columns": [
					{data: 'regional', name: 'regional'},
					{data: 'documento', name: 'documento'},
					{data: 'paterno', name: 'paterno'},
					{data: 'materno', name: 'materno'},
					{data: 'ap_casada', name: 'ap_casada'},
                    {data: 'genero', name: 'genero'},
                    {data: 'nombres', name: 'nombres'},
                    {data: 'nacionalidad', name: 'nacionalidad'},
                    {data: 'fechanacimiento', name: 'fechanacimiento'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
				]
			});
		});
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
	</script>
@endsection
