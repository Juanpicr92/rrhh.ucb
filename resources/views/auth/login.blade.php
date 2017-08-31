@extends('layouts.public')
@section('content')
    <section class="section-account">
        <div class="card col-sm-4 col-sm-offset-4" style="background-color:#f8f8f8;opacity:0.91" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <br/>
                        <h2 class="text-lg text-bold text-primary" style="color: #ffc107">UNIVERSIDAD CATOLICA BOLIVIANA</h2>
                        <br/><br/>
                        <form class="form floating-label"  role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <label for="email" >E-Mail Address</label>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <label for="password">Password</label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12" align="right">
                                    <button class="btn btn-primary btn-raised" type="submit">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!--end .col -->
                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>
    <!-- END LOGIN SECTION -->
@endsection

<style>
    .body-public{
        background-image: url("images/biblioteca noche.jpg");
    }
</style>