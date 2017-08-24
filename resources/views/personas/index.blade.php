@extends('layouts.admin')

@section('content')

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
			<a href="{{ route('persona.create') }}"  class="btn ink-reaction btn-floating-action btn-lg" style="background: #0aa89e;color: #FFFFFF;position:absolute;top:10px; left:240px;"role="button"> <i class="md md-add"></i></a>
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
                    {data: 'nombres', name: 'nombres'},
                    {data: 'genero', name: 'genero'},
                    {data: 'nacionalidad', name: 'nacionalidad'},
                    {data: 'fechanacimiento', name: 'fechanacimiento'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
				]
			});
		});
	</script>
@endsection
