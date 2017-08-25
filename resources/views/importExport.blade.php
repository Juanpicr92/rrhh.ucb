@extends('layouts.admin')
@section('content')

<nav class="navbar navbar-default">

    <div class="container-fluid">

        <div class="navbar-header">

            <a class="navbar-brand" href="#">Importar planillas en formato Excel</a>

        </div>

    </div>

</nav>

<div class="alert alert-info"> <div class="col-3">Para subir los datos es necesario que se cumpla la estructura de la plantilla, <strong>por favor descargue la plantilla.</strong></div>
        <div class="col-3" align="right"><a href="/Documentos/plantilla.xlsx"><button class="btn btn-success">Descargar Plantilla de Datos</button></a></div>
    </div>
<!-- BEGIN VALIDATION FORM WIZARD -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ">
                <div id="rootwizard2" class="form-wizard form-wizard-horizontal">
                    <!--form class="form floating-label form-validation" role="form" novalidate="novalidate"-->
                        <div class="form-wizard-nav">
                            <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
                            <ul class="nav nav-justified">
                                <li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Seleccionar Archivo</span></a></li>
                                <li><a href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">ACCOUNT</span></a></li>
                                <li><a href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">SETTINGS</span></a></li>
                                <li><a href="#step4" data-toggle="tab"><span class="step">4</span> <span class="title">CONFIRM</span></a></li>
                            </ul>
                        </div><!--end .form-wizard-nav -->
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="step1" align="center">
                                <br><br>
                                <div class="col-lg-offset-2 col-md-8">
                                    <div class="card">
                                        <div class="card-head style-primary">
                                            <header>Drag and drop uploader</header>
                                        </div>
                                        <div class="card-body no-padding">
                                            <form action="{{ URL::to('importExcel') }}" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="dz-message">
                                                    <h3>Arrastra el archivo excel aqui, o haz click para subir el archivo.</h3>
                                                    <em>(Debe utilizar el formato de la plantilla.)</em>
                                                </div>
                                                <a href="#step2"><button type="submit" class="form-control btn btn-success">Subir</button></a>
                                            </form>
                                        </div><!--end .card-body -->
                                    </div><!--end .card -->

                                </div>
                            </div><!--end #step1 -->
                            <div class="tab-pane" id="step2">
                                <br/><br/>
                                <div class="container">
                                    <table id="task" class="table table-hover table-condensed">
                                        <thead>
                                        <th>

                                            <th>ID</th>
                                            <th>Documento</th>
                                            <th>paterno</th>
                                            <th>materno</th>
                                            <th>ap_casada</th>
                                            <th>nombres</th>
                                            <th>nombre_completo</th>
                                            <th>gestion</th>
                                            <th>mes</th>
                                            <th>admn</th>
                                            <th>acad</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        oTable = $('#task').DataTable({
                                            "processing": true,
                                            "serverSide": true,
                                            "ajax": "{{ route('datatable.preview') }}",
                                            "columns": [
                                                {data: 'id', name: 'id'},
                                                {data: 'documento', name: 'documento'},
                                                {data: 'paterno', name: 'paterno'},
                                                {data: 'materno', name: 'materno'},
                                                {data: 'ap_casada', name: 'ap_casada'},
                                                {data: 'nombres', name: 'nombres'},
                                                {data: 'nombre_completo', name: 'nombre_completo'},
                                                {data: 'gestion', name: 'gestion'},
                                                {data: 'mes', name: 'mes'},
                                                {data: 'admn', name: 'admn'},
                                                {data: 'acad', name: 'acad'}
                                            ]
                                        });
                                    });
                                </script>
                            </div><!--end #step2 -->
                            <div class="tab-pane" id="step3">
                                <br/><br/>
                                <div class="form-group">
                                    <input type="text" name="url2" id="url2" class="form-control" data-rule-url="true" required="">
                                    <label for="url2" class="control-label">URL</label>
                                    <p class="help-block">Starts with http:// </p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="rangelength2" id="rangelength2" class="form-control" data-rule-rangelength="[5, 10]" required="">
                                    <label for="rangelength2" class="control-label">Range restriction</label>
                                    <p class="help-block">Between 5 and 10 </p>
                                </div>
                            </div><!--end #step3 -->
                            <div class="tab-pane" id="step4">
                                <br/><br/>
                                <div class="form-group">
                                    <div class="form-group">
                                        <select id="Age2" name="Age" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="60">60</option>
                                            <option value="70">70</option>
                                        </select>
                                        <label for="Age2">Age</label>
                                        <p class="help-block">This is supporting text for this field.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="textarea1" id="textarea1" class="form-control" rows="3"></textarea>
                                    <label>Textarea</label>
                                </div>
                            </div><!--end #step4 -->
                        </div><!--end .tab-content -->
                        <ul class="pager wizard">
                            <li class="previous first"><a class="btn-raised" href="javascript:void(0);">First</a></li>
                            <li class="previous"><a class="btn-raised" href="javascript:void(0);">Previous</a></li>
                            <li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li>
                            <li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
                        </ul>
                    <!--/form-->
                </div><!--end #rootwizard -->
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div><!--end .col -->
</div><!--end .row -->
<!-- END VALIDATION FORM WIZARD -->





@endsection