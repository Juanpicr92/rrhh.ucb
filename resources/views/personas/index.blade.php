@extends('layouts.admin')

@section('content')

<div class="container">
	<table id="task" class="table table-hover table-condensed">
		<thead>
		<tr>
			<th>CI</th>
			<th>Paterno</th>
			<th>Materno</th>
			<th>Nombres</th>
		</tr>
		</thead>
	</table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        oTable = $('#task').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.tasks') }}",
            "columns": [
                {data: 'documento', name: 'documento'},
                {data: 'paterno', name: 'paterno'},
                {data: 'materno', name: 'materno'},
                {data: 'nombres', name: 'nombres'}
            ]
        });
    });
</script>
@endsection