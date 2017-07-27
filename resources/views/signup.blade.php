@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/signup.css' />
@endsection

@section('content')
<div class='col-md-6'>
    <h2 class='title'>Rexistro</h2>

    <form action='{{route('psignup')}}' method='POST'>
        Nome de usuario: <input type='text' name='username' class='form-control form-field' placeholder='Nome de usuario' />
        Contrasinal: <input type='password' name='password' class='form-control form-field' placeholder='Contrasinal' />
        Email: <input type='email' name='email' class='form-control form-field' placeholder='Email' />
        <input type="hidden" name='_token' value='{{csrf_token()}}' />
        <input type="submit" class="btn btn-default btn-success" value="Rexistrar"/>
        <p class='login-prompt'>
            <small>Xa tes unha conta? <a href='{{route('login')}}'>Accede</a></small>
        </p>
    </form>
</div>
<div class='col-md-6 hidden-xs hidden-sm'>
    <div class='right-col-one'>
        <h4>Nome de usuario</h4>
        <p>O nome de usuario que usarás para accederes a {{env('APP_NAME')}}.</p>
    </p>
    <div class='right-col-next'>
        <div class='right-col'>
            <h4>Contrasinal</h4>
            <p>O contrasinal que usarás para accederes a  {{env('APP_NAME')}}.</p>
        </p>
    </div>
    <div class='right-col-next'>
        <h4>Email</h4>
        <p>O email que usarás para verificares a túa conta ou para recuperar o acceso á túa conta.</p>
    </p>

</div>
@endsection
