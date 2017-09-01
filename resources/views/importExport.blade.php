@extends('layouts.admin')
@section('content')

    <style>
        .hide_column{display: none}
    </style>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content card" style="padding: 30px">
                <div class="row" id="nombre_excel">

                </div>
                <div class="col-md-12 form" role="form">
                    {!! Form::open(['action'=>'PersonaController@correctPerson','files'=>true, 'method'=>'POST', 'id'=>'correct_form']) !!}
                    <div class="row">
                        <input type="hidden" class="form-group" id="id_excel" name="id_excel" value="">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Posibles personas</label>
                            <div class="col-sm-9">
                                <div class="radio radio-styled" id="listado_doc">
                                </div>
                            </div><!--end .col -->
                        </div><!--end .form-group -->
                    </div>
                    <div id="loader"><img src="{{asset('images/ajax-loader.gif')}}"></div>
                    {!! Form::close() !!}
                    <button class="btn btn-info" onclick="corregir()" id="corregir" style="float: left">Aceptar</button>
                    <button type="button" class="btn ink-reaction btn-floating-action btn-lg" data-dismiss="modal" style="background: #ffc107;color: #FFFFFF;position:absolute;right:20px;bottom:-55px"><i class="md md-close"></i></button>
                </div>
            </div>
        </div>
    </div>




    <div class="card card-bordered style-primary" style="margin-top: 10px;margin-left: 1%;width: 98%;">
        <div class="card-head">
            <header><i class="fa fa-fw fa-file-excel-o "></i> Importar planillas en formato Excel</header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright" style="display: block;">
            <!-- BEGIN VALIDATION FORM WIZARD -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="rootwizard2" class="form-wizard form-wizard-horizontal" style="width: 100%">
                        <!--form class="form floating-label form-validation" role="form" novalidate="novalidate"-->
                        <div class="form-wizard-nav">
                            <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
                            <ul class="nav nav-justified">
                                <li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Seleccionar Archivo</span></a></li>
                                <li><a id="paso2" href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">Verificar Datos</span></a></li>
                                <li><a id="paso3" href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">Configuracion</span></a></li>
                                <li><a id="paso4" href="#step4" data-toggle="tab"><span class="step">4</span> <span class="title">Confirmacion</span></a></li>
                            </ul>
                        </div><!--end .form-wizard-nav -->
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="step1" align="center">
                                <br><br>
                                <div class="col-lg-offset-2 col-md-8">
                                    <div class="card">
                                        <div class="card-head style-primary" style="color: #f8f8f8">
                                            <header>SUBIR PLANILLAS</header>
                                        </div>
                                        <div class="card-body no-padding">
                                            <div class="alert alert-info" style="width: 100%;margin-bottom: 0%;background: #bbdefb;color: #757575" > <div class="col-3">Para subir los datos es necesario que se cumpla la estructura de la plantilla, <strong>por favor descargue la plantilla.</strong></div>
                                                <div class="col-3" align="center"><a href="/Documentos/plantilla.xlsx"><button class="btn ink-reaction btn-flat btn-primary" >Descargar Plantilla de Datos</button></a></div>
                                            </div>
                                            <form action="{{ URL::to('importExcel') }}" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data" style="margin-top: -20px">
                                                {{ csrf_field() }}
                                                <div class="dz-message">
                                                    <h3>Arrastra el archivo excel aqui, o haz click para subir el archivo.</h3>
                                                    <em>(Debe utilizar el formato de la plantilla.)</em>
                                                </div>
                                                <!--a href="#step2"><button type="submit" class="form-control btn btn-success">Subir</button></a-->
                                            </form>
                                        </div><!--end .card-body -->
                                    </div><!--end .card -->

                                </div>
                            </div><!--end #step1 -->
                            <div class="tab-pane" id="step2">
                                <br/><br/>
                                    <table id="task" class="table table-hover" style="width: 99%;font-size: smaller;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Documento</th>
                                            <th>paterno</th>
                                            <th>materno</th>
                                            <th>ap_casada</th>
                                            <th>nombres</th>
                                            <th>nombre_completo</th>
                                            <th>admn</th>
                                            <th>acad</th>
                                            <th>Emparejado</th>
                                        </tr>
                                        </thead>
                                    </table>
                            </div><!--end #step2 -->
                            <div class="tab-pane" id="step3">
                                <br/><br/>
                                <form id="gestionmes" class="form-validate">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <label for="mes">Mes</label>
                                        <select id="mes" name="mes" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        <p class="help-block">Seleccione un mes.</p>
                                    </div>
                                <div class="form-group floating-label">
                                    <label for="gestion" class="control-label">Gestion</label>
                                    <input type="number" name="gestion" id="gestion" class="form-control" data-rule-rangelength="[1800, 2017]" max="2017" min="1900" required="">
                                    <p class="help-block">Gestion de la planilla.</p>
                                </div>
                                <br>
                                <div class="form-group floating-label">
                                    <label for="regional">Regional</label>
                                    <select id="regional" name="regional" class="form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="La Paz">La Paz</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="EPC">EPC</option>
                                        <option value="Nacional">Nacional</option>
                                    </select>
                                    <p class="help-block">Seleccione una Regional.</p>
                                </div>

                                </form>
                                <br>
                                <button class="btn btn-info" onclick="setGestionMes()" style="float: right">Aceptar</button>
                            </div><!--end #step3 -->
                            <div class="tab-pane" id="step4">
                                <br/><br/>
                                <div class="form-group">
                                    <div class="form-group" align="center">
                                        <button class="btn" id="fin" name="fin" onclick="finish()"> Finalizar</button>
                                    </div>
                                </div>
                            </div><!--end #step4 -->
                        </div><!--end .tab-content -->
                        <!--/form-->
                    </div><!--end #rootwizard -->
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END VALIDATION FORM WIZARD -->
        </div><!--end .card-body -->
    </div>
<script type="text/javascript">
    Dropzone.options.myAwesomeDropzone = {
        success: function(){
            oTable.ajax.reload(null,false);
            $('#paso2').click();
            //oTable.data.reload();
        },

        /*init: function() {
            this.on("addedfile", function(file) { alert("Added file."); });
        }*/
    };
    rootwizard2
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({

                type: "POST",
                url: '/api/verificarmatched',
                data: {},
                success: function( response ) {
                    console.log(response);
                    if(response.info == true) {
                        $('#fin').addClass('btn-success');
                        $('#fin').removeAttr( "disabled" );
                    }
                    else {
                        $('#fin').addClass('btn-danger');
                        $('#fin').attr("disabled", true);
                    }

                }
            });


            oTable = $('#task').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('datatable.preview') }}",
                "columns": [
                    {data: 'id', name: 'id',orderable: false, searchable: false},
                    {data: 'documento', name: 'documento',orderable: false, searchable: false},
                    {data: 'paterno', name: 'paterno',orderable: false, searchable: false},
                    {data: 'materno', name: 'materno',orderable: false, searchable: false},
                    {data: 'ap_casada', name: 'ap_casada',orderable: false, searchable: false},
                    {data: 'nombres', name: 'nombres',orderable: false, searchable: false},
                    {data: 'nombre_completo', name: 'nombre_completo',orderable: false, searchable: false},
                    {data: 'admn', name: 'admn',orderable: false, searchable: false},
                    {data: 'acad', name: 'acad',orderable: false, searchable: false},
                    {data: 'matched', name: 'matched',sClass: "hide_column"}
                ],
                "rowCallback": function( row, data, index ) {
                    if ( data['matched'] == '1' )
                    {
                        $('td', row).css('background-color', '#ccff90');
                    }
                    else
                    {
                        $('td', row).css('background-color', '#ff5252').css('color','#f8f8f8');
                    }
                },
                "order": [[ 9, "asc" ]]

            });

            $('#task tbody').on('click', 'tr', function () {
                var table = $('#task').DataTable();
                var rows = table.row(this).data();
                var id=rows['id']
                $('#myModal').modal('show');
                $("#id_excel").val(id);
                $( "#listado_doc" ).empty();
                $( "#nombre_excel" ).empty();
                $( "#nombre_excel" ).append('<h2>'+rows['nombre_completo']+'</h2>');
                $( "#listado_doc" ).append('<div class="radio radio-styled" id="listado_doc"> <label> <input type="radio" name="documento" value="NUEVO" checked=""> <span>Nueva persona</span> </label> </div>');
                $.ajax({
                    type: "POST",
                    url: '/api/jaro/'+id,
                    data: {},
                    beforeSend: function() {
                        $('#loader').show();
                        $('#corregir').hide();
                    },
                    complete: function(){
                        $('#loader').hide();$('#corregir').show();

                    },
                    success: function( response ) {
                        console.log(response);
                        $.each(response, function(index) {
                            $( "#listado_doc" ).append('<div class="radio radio-styled" id="listado_doc"> <label> <input type="radio" name="documento" value="'+response[index].documento+'" checked=""> <span>'+response[index].paterno+' '+response[index].materno+' '+response[index].nombres+'</span> </label> </div>');
                        });
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        function setGestionMes() {
            console.log('gestionmes');
            //var gestion = document.getElementById('gestion').value;
            //var mes = document.getElementById('mes').value;
            //var _token = document.getElementById('_token').value;

            $.ajax({
                type: "POST",
                url: '/importExport/setGestionMes',
                data: $('#gestionmes').serialize(),
                success: function( response ) {
                    console.log(response);
                    $('#paso4').click();
                }
            });

        }
    </script>

    <script type="text/javascript">
        function corregir() {
            $.ajax({
                type: "POST",
                url: '/api/correctperson',
                data: $('#correct_form').serialize(),
                success: function( response ) {
                    oTable.ajax.reload(null,false);
                    console.log(response.status);
                    if (response.status === true){
                        console.log(response.message);
                        $('#myModal').modal('hide');
                        $('#modal-success').modal('toggle');
                        $('#mensaje-exito').append('<h2>'+response.message+'</h2>')
                    }else {
                        $('#modal-error').modal('toggle');
                        $('#mensaje-error').append('<h2>'+response.message+'</h2>')
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        function finish() {
            $.ajax({
                type: "POST",
                url: '/api/FinishExcel',
                data: {},
                success: function( response ) {
                    console.log(response.status);
                    if (response.status === true){
                        console.log(response.message);
                        $('#myModal').modal('hide');
                        $('#modal-success').modal('toggle');
                        $('#mensaje-exito').append('<h2>'+response.message+'</h2>')
                        $('#paso1').click();
                    }else {
                        $('#modal-error').modal('toggle');
                        $('#mensaje-error').append('<h2>'+response.message+'</h2>')
                    }
                }
            });
        }
    </script>



@endsection