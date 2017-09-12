@extends('layouts.admin')

@section('content')

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content card" style="padding: 30px">
				<h2>Registro de Personas</h2>
				<div class="col-md-12 form" role="form">
					{!! Form::open([ 'method'=>'POST','id'=>'personaForm']) !!}
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('ci',null,['id'=>'ci', 'name'=>'ci', 'class'=>'form-control', 'value'=>"{{ old('ci') }}"]) !!}
						{!! Form::label('CI:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('paterno',null,['id'=>'paterno', 'name'=>'paterno', 'class'=>'form-control', 'value'=>"{{ old('paterno') }}"]) !!}
						{!! Form::label('Apellido Paterno:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('materno') ? 'has-error' : ''}}">
						{!! Form::text('materno',null,['id'=>'materno', 'name'=>'materno', 'class'=>'form-control', 'value'=>"{{ old('materno') }}"]) !!}
						{!! Form::label('Apellido Materno:') !!}
						<span class="text-danger">{{ $errors->first('materno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('casada',null,['id'=>'casada', 'name'=>'casada', 'class'=>'form-control', 'value'=>"{{ old('casada') }}"]) !!}
						{!! Form::label('Apellido Casada:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('name') ? 'has-error' : ''}}">
						{!! Form::text('name',null,['id'=>'name', 'name'=>'name', 'class'=>'form-control', 'value'=>"{{ old('name') }}"]) !!}
						{!! Form::label('Nombres:') !!}
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group control-width-normal">
								<div class="input-group date" data-provide="datepicker">
									<div class="input-group-content">
										{!! Form::text('birthDate',null,['id'=>'birthDate', 'name'=>'birthDate', 'class'=>'form-control']) !!}
										<label>Fecha nacimiento</label>
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div><!--end .form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group floating-label">
								<label for="regional">Regional</label>
								<select id="regional" name="regional" class="form-control">
									<option value="">Seleccionar</option>
									<option value="LA PAZ">La Paz</option>
									<option value="SANTA CRUZ">Santa Cruz</option>
									<option value="COCHABAMBA">Cochabamba</option>
									<option value="EPC">EPC</option>
									<option value="NACIONAL">Nacional</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group floating-label {{ $errors->has('nacionalidad') ? 'has-error' : ''}}">
								{!! Form::text('name',null,['id'=>'nacionalidad', 'name'=>'nacionalidad', 'class'=>'form-control', 'value'=>"{{ old('nacionalidad') }}"]) !!}
								{!! Form::label('Nacionalidad:') !!}
								<span class="text-danger">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group floating-label">
								<label for="genero">Genero</label>
								<select id="genero" name="genero" class="form-control">
									<option value="">Seleccionar</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
					<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-success" id="store" style="color: #FFFFFF;position:absolute;right:80px;bottom:-55px"><i class="md md-save"></i></button>
					<button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-dismiss="modal" style="background: #ffc107;color: #FFFFFF;position:absolute;right:20px;bottom:-55px"><i class="md md-close"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div id="updateModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content card" style="padding: 30px">
				<h2>Modificar de Personas</h2>
				<div class="col-md-12 form" role="form">
					{!! Form::open([ 'method'=>'POST','id'=>'personaForm_u']) !!}
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('ci',null,['id'=>'ci_u', 'name'=>'ci', 'class'=>'form-control', 'value'=>"{{ old('ci') }}"]) !!}
						{!! Form::label('CI:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('paterno',null,['id'=>'paterno_u', 'name'=>'paterno', 'class'=>'form-control', 'value'=>"{{ old('paterno') }}"]) !!}
						{!! Form::label('Apellido Paterno:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('materno') ? 'has-error' : ''}}">
						{!! Form::text('materno',null,['id'=>'materno_u', 'name'=>'materno', 'class'=>'form-control', 'value'=>"{{ old('materno') }}"]) !!}
						{!! Form::label('Apellido Materno:') !!}
						<span class="text-danger">{{ $errors->first('materno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('paterno') ? 'has-error' : ''}}">
						{!! Form::text('casada',null,['id'=>'casada_u', 'name'=>'casada', 'class'=>'form-control', 'value'=>"{{ old('casada') }}"]) !!}
						{!! Form::label('Apellido Casada:') !!}
						<span class="text-danger">{{ $errors->first('paterno') }}</span>
					</div>
					<div class="form-group floating-label {{ $errors->has('name') ? 'has-error' : ''}}">
						{!! Form::text('name',null,['id'=>'name_u', 'name'=>'name', 'class'=>'form-control', 'value'=>"{{ old('name') }}"]) !!}
						{!! Form::label('Nombres:') !!}
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group control-width-normal">
								<div class="input-group date" data-provide="datepicker">
									<div class="input-group-content">
										{!! Form::text('birthDate',null,['id'=>'birthDate_u', 'name'=>'birthDate', 'class'=>'form-control']) !!}
										<label>Fecha nacimiento</label>
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div><!--end .form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group floating-label">
								<label for="regional_u">Regional</label>
								<select id="regional_u" name="regional" class="form-control">
									<option value="">Seleccionar</option>
									<option value="LA PAZ">La Paz</option>
									<option value="SANTA CRUZ">Santa Cruz</option>
									<option value="COCHABAMBA">Cochabamba</option>
									<option value="EPC">EPC</option>
									<option value="NACIONAL">Nacional</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group floating-label {{ $errors->has('nacionalidad') ? 'has-error' : ''}}">
								{!! Form::text('name',null,['id'=>'nacionalidad_u', 'name'=>'nacionalidad', 'class'=>'form-control', 'value'=>"{{ old('nacionalidad') }}"]) !!}
								{!! Form::label('Nacionalidad:') !!}
								<span class="text-danger">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group floating-label">
								<label for="genero_u">Genero</label>
								<select id="genero_u" name="genero" class="form-control">
									<option value="">Seleccionar</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
					<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-success" id="update" style="color: #FFFFFF;position:absolute;right:80px;bottom:-55px"><i class="md md-save"></i></button>
					<button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-dismiss="modal" style="background: #ffc107;color: #FFFFFF;position:absolute;right:20px;bottom:-55px"><i class="md md-close"></i></button>
				</div>
			</div>
		</div>
	</div>

	<section class="card col-md-11 col-md-offset-1  style-default-bright" style="margin-top: 10px;margin-left: 1%;width: 98%;">
		<div class="section-body">
			<h2 class="text-primary">Listado de Personal</h2>
			<table id="task" class="table table-hover" style="width: 98%;font-size: smaller;">
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
				</tr>
				</thead>
			</table>
				<button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-toggle="modal" style="background: #ffc107;color: #FFFFFF;position:absolute;top:33px; left:240px;" data-target="#myModal"><i class="md md-add"></i></button>
			</div><!--end .section-body -->
	</section>


	<script type="text/javascript">
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
		$(document).ready(function() {
			oTable = $('#task').DataTable({
				"processing": true,
				"serverSide": true,
                ajax: 'http://192.168.101.14:8000/task',
				"columns": [
					{data: 'regional', name: 'regional'},
					{data: 'documento', name: 'documento'},
					{data: 'paterno', name: 'paterno'},
					{data: 'materno', name: 'materno'},
					{data: 'ap_casada', name: 'ap_casada'},
                    {data: 'nombres', name: 'nombres'},
                    {data: 'genero', name: 'genero'},
                    {data: 'nacionalidad', name: 'nacionalidad'},
                    {data: 'fechanacimiento', name: 'fechanacimiento'},
				]
			});
            $('#task tbody').on('click', 'tr', function () {
                var table = $('#task').DataTable();
                var rows = table.row(this).data();
                var id=rows['documento']
                $('#updateModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: '/persona/'+id+'/edit',
                    data: {},
                    success: function( response ) {
                        $("#ci_u").val(response[0].documento).addClass('dirty');
                        $("#paterno_u").val(response[0].paterno).addClass('dirty');
                        $("#materno_u").val(response[0].materno).addClass('dirty');
                        $("#name_u").val(response[0].nombres).addClass('dirty');
                        $("#casada_u").val(response[0].ap_casada).addClass('dirty');
                        $("#birthDate_u").val(response[0].fechanacimiento).addClass('dirty');
                        $("#nacionalidad_u").val(response[0].nacionalidad).addClass('dirty');
                        $('#genero_u option[value='+response[0].genero+']').attr('selected','selected');
                        $('#regional_u option[value='+response[0].regional+']').attr('selected','selected');
                    }
                });

            });
		});

        function personaStore() {
            $.ajax({
                type: "POST",
                url: '/persona/store',
                data: $('#personaForm').serialize(),
                success: function( response ) {
                    evalResponseForm(response,'#myModal','#personaForm',oTable );
                }
            });
        };
        $('#store').on('click', function () {
			personaStore();
        });
        function personaUpdate() {
            $.ajax({
                type: "PUT",
                url: '/persona/'+$("#ci_u").val(),
                data: $('#personaForm_u').serialize(),
                success: function( response ) {
                    evalResponseForm(response,'#updateModal','#personaForm_u');
					oTable.ajax.reload(null,false);
                }
            });
        };
        $('#update').on('click', function () {
            personaUpdate();
        });

	</script>
@endsection
