@extends('layouts.minimal')

@section('title')
Setup Completed
@endsection

@section('css')
<link rel='stylesheet' href='/css/default-bootstrap.min.css'>
<link rel='stylesheet' href='/css/setup.css'>
@endsection

@section('content')
<div class="navbar navbar-default navbar-fixed-top">
    <a class="navbar-brand" href="/">Polr</a>
</div>

<div class='row'>
    <div class='col-md-3'></div>

    <div class='col-md-6 setup-body well'>
        <div class='setup-center'>
            <img class='setup-logo' src='/img/logo.png'>
        </div>
        <h2>Configuración completa</h2>
        <p>A configuración de Polr está completa. Para continuares, podes <a href='{{route('login')}}'>acceder</a> ou
            ir para a <a href='{{route('index')}}'>páxina principal</a>.
        </p>
        <p>Valora darlle botarlle unha vista de ollos á <a href='http://docs.polr.me/'>documentación</a> ou o <a href='//github.com/cydrobolt/polr'>README</a>
            para máis axuda.
        </p>
        <p>Tamén podes unirte a nós no IRC na sala <a href='//webchat.freenode.net/?channels=#polr'><code>#polr</code></a> de freenode para obteres axuda ou resposta ás túas dúbidas.</p>

        <p>Graciñas por usares Polr!</p>
    </div>

    <div class='col-md-3'></div>
</div>


@endsection
