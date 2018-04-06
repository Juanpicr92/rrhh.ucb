@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1  style-default-bright" style="margin-top: 10px;margin-left: 1%;width: 98%;">
            <form class="form-horizontal" id="search-form">
                <div class="card card-collapsed">
                    <div class="card-head style-primary">
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-up" style="font-size: 28px;"></i></a>
                            </div>
                        </div>
                        <header>Filtros</header>
                    </div>
                    <div class="card-body" style="display: none;" >
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="text-primary" style="margin-top: 10px;">Por Fechas:</h3>
                                <div class="form-group" style="padding: 0px 25px">
                                    <div class="input-daterange input-group" id="demo-date-range">
                                        <span class="input-group-addon">Desde</span>
                                        <div class="input-group-content">
                                            <input type="text" class="form-control" name="inicio"  id="inicio" value="{{$fecha}}" />
                                        </div>
                                        <span class="input-group-addon">hasta</span>
                                        <div class="input-group-content">
                                            <input type="text" class="form-control" name="fin"  id="fin" value="{{$fecha}}"/>
                                            <div class="form-control-line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-primary" style="margin-top: 10px;">Por Regionales:</h3>
                                <div class="form-group" style="padding: 0px 25px">
                                    <div class="col-sm-9" id="regional">
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="LA PAZ" checked="checked"><span>La Paz</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="COCHABAMBA" checked="checked"><span>Cochabamba</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="TARIJA" checked="checked"><span>Tarija</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="EPC" checked="checked"><span>EPC</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="SANTA CRUZ" checked="checked"><span>Santa Cruz</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="regional[]"  type="checkbox" value="CENTRAL" checked="checked"><span>Unidad Central</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-primary" style="margin-top: 10px;">Por Tipos:</h3>
                                <div class="form-group" style="padding: 0px 25px">
                                    <div class="col-sm-12" id="tipo">
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipó[]"  type="checkbox" value="ADMINISTRATIVO" checked="checked"><span>ADMINISTRATIVO</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="DOCENTE TIEMPO COMPLETO" checked="checked"><span>DOCENTE TIEMPO COMPLETO</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="DOCENTE TIEMPO HORARIO" checked="checked"><span>DOCENTE TIEMPO HORARIO</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="AUTORIDAD" checked="checked"><span>AUTORIDAD</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="AUTORIDAD ADMINISTRATIVA" checked="checked"><span>AUTORIDAD ADMINISTRATIVA</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="AUTORIDAD ACADEMICA" checked="checked"><span>AUTORIDAD ACADEMICA</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="DOCENTE MEDIO TIEMPO" checked="checked"><span>DOCENTE MEDIO TIEMPO</span>
                                        </label>
                                        <label class="checkbox-inline checkbox-styled">
                                            <input name="tipo[]"  type="checkbox" value="ACADEMICO" checked="checked"><span>ACADEMICO</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->
                            </div>
                        </div>
                        <div class="card-actionbar-row">
                            <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
                        </div>
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </form>
        </div><!--end .col -->
    </div><!--end .row -->
    <!-- END HORIZONTAL FORM -->
    <section class="card col-md-11 col-md-offset-1  style-default-bright" style="margin-top: -20px;margin-left: 1%;width: 98%;padding-top: 0px;">
        <div class="section-body">
            <h2 class="text-primary">Listado de Altas y bajas</h2>
            <h4 class="text-primary">Exportar lista a:</h4>
            <table id="task" class="table table-hover" style="width: 98%;font-size: smaller;">
                <thead>
                <tr>
                    <th>N</th>
                    <th>Mes</th>
                    <th width="50px">Estado</th>
                    <th width="80px">CI</th>
                    <th>Regional</th>
                    <th>Tipo</th>
                    <th>Cargo</th>

                </tr>
                </thead>
            </table>
        </div>
    </section>
    <script type="text/javascript">
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $(document).ready(function() {
            oTable = $('#task').DataTable({
                "processing": true,
                "serverSide": true,
                bPaginate:false,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                searching:false,
                ajax: {
                    url: "{{ url('/rotacionTable') }}",
                    data: function (d) {
                        d.inicio = $('#inicio').val();
                        d.fin = $('#fin').val();
                        d.regional = [];
                        d.tipo = [];
                        $('#regional input[type="checkbox"]:checked').each(function () {
                            d.regional.push($(this).val());
                        });
                        $('#tipo input[type="checkbox"]:checked').each(function () {
                            d.tipo.push($(this).val());
                        });
                    }
                },
                "columns": [
                    {data: 'mes', name: 'mes'},
                    {data: 'gestion', name: 'gestion'},
                    {data: 'estado', name: 'estado'},
                    {data: 'ci', name: 'ci'},
                    {data: 'regional', name: 'regional'},
                    {data: 'tipo', name: 'tipo'},
                    {data: 'cargo_nuevo', name: 'cargo_nuevo'}
                ]

            });
        });
        $('#search-form').on('submit', function(e) {
            oTable.draw();
            e.preventDefault();
        });
    </script>

@endsection
