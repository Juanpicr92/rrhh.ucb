@extends('layouts.admin')

@section('content')
    <div id="content">
        <div class="row">
            <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
                <div class="card">
                    <div class="card-body">
                        <h2>Edición del Logotipo del Restaurant</h2>
                        <div class="col-md-12 form" role="form">
                            {!! Form::model($restaurant, ['files'=>true, 'method' => 'PUT','route' => ['restaurants.actualize', $restaurant->id]]) !!}

                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <strong>¡Vaya!</strong> Hubieron algunos problemas mientras llenaba los campos.
                                    <br/>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <?php
                            $mitexto= $logo->name.'.'.$logo->type;
                            $cadena = str_replace("/tmp","",$mitexto);
                            ?>

                            <div class="well clearfix">
                                <h4>Restaurante: {{ $restaurant->name}}</h4>
                                <img class="height-3 pull-right img-circle" <?php echo" src='http://192.168.10.10/logo/".$cadena."' alt=''"; ?> />
                                <h4>Descripción: </h4>
                                <p>{{ $restaurant->description}}</p>
                            </div>
                            <div class="form-group floating-label {{ $errors->has('logo') ? 'has-error' : '' }}">
                                {!! Form::file('logo',null,['id'=>'logo', 'name'=>'logo','class'=>'form-control',  'value'=>"{{ old('image') }}"]) !!}
                                {!! Form::label('Logotipo:') !!}
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            </div>
                            <?php  ?>
                            {!! Form::submit('Modificar Logotipo',['class'=>'btn btn-primary']) !!}
                            <?php ?>
                            {!! Form::close() !!}
                            <a href="{{ route('restaurants.index') }}"  class="btn ink-reaction btn-floating-action btn-lg" style="background: #0aa89e;color: #FFFFFF;position:absolute;right:20px;bottom:-48px"role="button"> <i class="md md-undo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end .row -->
    </div>

@endsection