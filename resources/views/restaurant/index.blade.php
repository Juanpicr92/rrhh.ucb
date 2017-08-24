@extends('layouts.admin')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <section class="card col-md-10 col-md-offset-1  style-default-bright" style="margin-top: 25px">
        <div class="section-body">
            <h2 class="text-primary">Listado de Restaurantes</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th style="text-align: right">Acciones</th>
                </tr>
                </thead>
                @foreach($restaurants as $restaurant)
                    <tbody>
                    <tr>
                        <td>{{$restaurant->id}}</td>
                        <td>{{$restaurant->name}}</td>
                        <td>{{$restaurant->description}}</td>
                        <td style="text-align: right">
                            <a href="{{ route('restaurants.show',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-home"></span></a>
                            <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-edit"></span></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['restaurants.destroy', $restaurant->id],'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon-toggle'] )  }}
                            {!! Form::close() !!}
                            <a href="{{ route('restaurants.edit2',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-picture"></span></a>
                            <a href="{{ route('branches.index2',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-list"></span></a>
                            <a href="{{ route('branches.create',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-glass"></span></a>
                            <a href="{{ route('products.roster',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-th-list"></span></a>
                            <a href="{{ route('products.create',$restaurant->id) }}" class="btn btn-icon-toggle"><span class="glyphicon glyphicon-cutlery"></span></a>

                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            {!! $restaurants->render() !!}
            <a href="{{ route('restaurants.create') }}"  class="btn ink-reaction btn-floating-action btn-lg" style="background: #0aa89e;color: #FFFFFF;position:absolute;right:20px;bottom:-28px"role="button"> <i class="md md-add"></i></a>
        </div><!--end .section-body -->
    </section>
@endsection
