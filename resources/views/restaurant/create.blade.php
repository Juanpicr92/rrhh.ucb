@extends('layouts.admin')

@section('content')

<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <div class="card">
                <div class="card-body">
                    <h2>Registro de Restaurantes</h2>
                    <div class="col-md-12 form" role="form">
                    {!! Form::open(['action'=>'RestaurantController@store','files'=>true, 'method'=>'POST']) !!}

                    @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>¡Vaya!</strong> Hubieron algunos problemas mientras llenaba los campos.
                            <br/>
                        </div>
                    @endif
                    <div class="form-group floating-label {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::text('name',null,['id'=>'name', 'name'=>'name', 'class'=>'form-control', 'value'=>"{{ old('name') }}"]) !!}
                        {!! Form::label('Nombre:') !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group floating-label {{ $errors->has('description') ? 'has-error' : '' }}">
                        {!! Form::text('description',null,['id'=>'description', 'name'=>'description','class'=>'form-control','value'=>"{{ old('name') }}"]) !!}
                        {!! Form::label('Descripción:') !!}
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                    <div class="form-group  floating-label {{ $errors->has('phone') ? 'has-error' : '' }}">
                        {!! Form::text('phone',null,['id'=>'phone', 'name'=>'phone','class'=>'form-control', 'value'=>"{{ old('phone') }}"]) !!}
                        {!! Form::label('Teléfono:') !!}
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="form-group floating-label {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::email('email',null,['id'=>'email', 'name'=>'email','class'=>'form-control', 'value'=>"{{ old('email') }}"]) !!}
                        {!! Form::label('Correo electronico:') !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group floating-label {{ $errors->has('image') ? 'has-error' : '' }}">
                        {!! Form::file('image',null,['id'=>'image', 'name'=>'image','class'=>'form-control', 'value'=>"{{ old('image') }}"]) !!}
                        {!! Form::label('Imagen:') !!}
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                    <div class="form-group floating-label {{ $errors->has('logo') ? 'has-error' : '' }}">
                        {!! Form::file('logo',null,['id'=>'logo', 'name'=>'logo','class'=>'form-control',  'value'=>"{{ old('image') }}"]) !!}
                        {!! Form::label('Logotipo:') !!}
                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                    </div>
                    <?php  ?>
                    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
                    <?php ?>
                    {!! Form::close() !!}
                    <a href="{{ route('restaurants.index') }}"  class="btn ink-reaction btn-floating-action btn-lg" style="background: #0aa89e;color: #FFFFFF;position:absolute;right:20px;bottom:-48px"role="button"> <i class="md md-undo"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div><!--end .row -->

@endsection
