@extends('layouts.admin')
@section('content')

    <style>
        .fullscreen{
            z-index: 9999;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 0!important;
        }
    </style>

    <div class="row">
        <div class="col-md-6" style="padding: 20px">
            <div class="card card-outlined style-primary">
            <div class="card-head">
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                            <a class="btn btn-icon-toggle btn-full"><i class="md md-close"></i></a>
                        </div>
                    </div>
                    <header><i class="fa fa-fw fa-tag"></i> Header</header>
                </div><!--end .card-head -->
                <div class="card-body" style="display: block;">
                    <div style="width:100%;">
                        {!! $chartjs->render() !!}
                    </div>
                </div><!--end .card-body -->
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('.btn-full').on('click', function () {
           console.log(this.parent().parent().parent().parent().class());
        });
    </script>

@endsection
