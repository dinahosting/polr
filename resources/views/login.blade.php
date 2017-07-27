@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/login.css' />
@endsection

@section('content')
<div class="center-text">
    <h1>Acceder</h1><br/><br/>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="login" method="POST">
            <input type="text" placeholder="Nome de usuario" name="username" class="form-control login-field" />
            <input type="password" placeholder="Contrasinal" name="password" class="form-control login-field" />
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
            <input type="submit" value="Acceder" class="login-submit btn btn-success" />

            <p class='login-prompts'>
            @if (env('POLR_ALLOW_ACCT_CREATION') == true)
                <small>Aínda non tes unha conta? <a href='{{route('signup')}}'>Crea unha</a></small>
            @endif

            @if (env('SETTING_PASSWORD_RECOV') == true)
                <small>Esqueceches o teu contrasinal? <a href='{{route('lost_password')}}'>Recuperar</a></small>
            @endif
            </p>
        </form>
    </div>
    <div class="col-md-3"></div>
</div
@endsection
