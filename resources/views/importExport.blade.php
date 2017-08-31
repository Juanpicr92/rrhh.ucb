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
                    {!! Form::open(['action'=>'PersonaController@correctPerson','files'=>true, 'method'=>'POST']) !!}
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
                    <div id="loader"><img src="images/ajax-loader.gif"></div>
				    <?php  ?>
                    {!! Form::submit('Corregir',['class'=>'btn btn-primary','id'=>'corregir']) !!}
				    <?php ?>
                    {!! Form::close() !!}
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
                                <li><a id="paso2" href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">ACCOUNT</span></a></li>
                                <li><a href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">SETTINGS</span></a></li>
                                <li><a href="#step4" data-toggle="tab"><span class="step">4</span> <span class="title">CONFIRM</span></a></li>
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
                                            <th>gestion</th>
                                            <th>mes</th>
                                            <th>admn</th>
                                            <th>acad</th>
                                            <th>Emparejado</th>
                                        </tr>
                                        </thead>
                                    </table>
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
                    {data: 'gestion', name: 'gestion'},
                    {data: 'mes', name: 'mes',orderable: false, searchable: false},
                    {data: 'admn', name: 'admn',orderable: false, searchable: false},
                    {data: 'acad', name: 'acad',orderable: false, searchable: false},
                    {data: 'matched', name: 'matched',sClass: "hide_column"},
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
                "order": [[ 11, "asc" ]]

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
@endsection