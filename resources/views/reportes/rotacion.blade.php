@extends('layouts.admin')
@section('content')
        <div class="col-md-6" style="padding: 20px">
            <div class="card card-outlined style-primary">
                <div class="card-head">
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                            <a class="btn btn-icon-toggle btn-full"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <header><i class="fa fa-fw fa-tag"></i> </header>
                </div><!--end .card-head -->
                <div class="card-body" style="display: block;">
                    <div style="width:100%;">
                        {!! $chartjs->render() !!}
                    </div>
                </div><!--end .card-body -->
            </div>
        </div>
        <div class="col-md-6" style="padding: 20px">
            <div class="card card-outlined style-primary">
                <div class="card-head">
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                            <a class="btn btn-icon-toggle btn-full"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <header><i class="fa fa-fw fa-tag"></i>Listado de rotación</header>
                </div><!--end .card-head -->
                <div class="card-body" style="display: block;height: 550px;overflow: scroll;">
                    <div class="form-group col-md-3" >
                        <label for="mes">Mes</label>
                        <select id="mes" name="mes" class="form-control rotacionfilter">
                            <option value="">Ultimo</option>
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
                    </div>
                    <div class="form-group col-md-3" >
                        <label for="gestion">Gestion</label>
                        <select id="gestion" name="gestion" class="form-control rotacionfilter">
                        </select>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label for="regional">Regional</label>
                        <select id="regional" name="regional" class="form-control rotacionfilter">
                            <option value="">Todas</option>
                            <option value="LA PAZ">La Paz</option>
                            <option value="SANTA CRUZ">Santa Cruz</option>
                            <option value="COCHABAMBA">Cochabamba</option>
                            <option value="EPC">EPC</option>
                            <option value="NACIONAL">Nacional</option>
                        </select>
                    </div>
                    <table class="table no-margin table-hover">
                        <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre completo</th>
                            <th>Regional</th>
                        </tr>
                        </thead>
                        <tbody id="rotacion">
                        </tbody>
                    </table>
                </div><!--end .card-body -->
            </div>
        </div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".rotacionfilter").change(function(){
            loadtable($('#mes').val(),$('#gestion').val(),$('#regional').val());
        });
        loadtable('5',2017);
        $.ajax({
            type: "POST",
            url: '/api/getYear',
            success: function( response ) {
                $('#gestion').empty();
                $('#gestion').append('<option value="">Ultima</option>');
                $.each(response, function(index) {
                    $( "#gestion" ).append('<option value="'+response[index].gestion+'">'+response[index].gestion+'</option>');
                });
                console.log(response);
            }
        });
    });


    function loadtable(mes = '',gestion='',regional = '') {
        $.ajax({
            type: "POST",
            url: '/api/getListadoRotacion',
            data: {
                'mes':mes,
                'gestion':gestion,
                'regional':regional,

            },
            success: function( response ) {
                $('#rotacion').empty();
                $.each(response, function(index) {
                    if (response[index].altaBaja===0){
                        $( "#rotacion" ).append('<tr class="danger"><td>'+response[index].ci+'</td><td>'+response[index].nombre+'</td><td>'+response[index].regional+'</td></tr>');
                    }else {
                        $( "#rotacion" ).append('<tr class="success"><td>'+response[index].ci+'</td><td>'+response[index].nombre+'</td><td>'+response[index].regional+'</td></tr>');
                    }
                });
            }
        });
    }
</script>


@endsection
