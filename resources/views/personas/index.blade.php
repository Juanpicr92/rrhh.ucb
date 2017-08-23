<!DOCTYPE html>
<html>
<head>
	<title>Laravel DataTables</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.4.0/b-colvis-1.4.0/b-flash-1.4.0/b-html5-1.4.0/b-print-1.4.0/cr-1.3.3/fc-3.2.2/fh-3.1.2/kt-2.3.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.2/datatables.min.css"/>

	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.4.0/b-colvis-1.4.0/b-flash-1.4.0/b-html5-1.4.0/b-print-1.4.0/cr-1.3.3/fc-3.2.2/fh-3.1.2/kt-2.3.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.2/datatables.min.js"></script>

</head>
<body>

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
</body>
</html>