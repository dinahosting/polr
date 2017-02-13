@extends('layouts.minimal') @section('title') Konfigurazioa bukatu da @endsection @section('css')
<link rel='stylesheet' href='/css/default-bootstrap.min.css'>
<link rel='stylesheet' href='/css/setup.css'>@endsection @section('content')
<div class="navbar navbar-default navbar-fixed-top">
  <a class="navbar-brand" href="/">Polr
  </a>
</div>
<div class='row'>
  <div class='col-md-3'>
  </div>
  <div class='col-md-6 setup-body well'>
    <div class='setup-center'>
      <img class='setup-logo' src='/img/logo.png'>
    </div>
    <h2>Konfigurazioa bukatu da
    </h2>
    <p>Polr-en konfigurazioa bukatu da. Jarraitzeko, 
      <a href='{{route('login')}}'>saioa hasi
      </a> behar duzu, edo 
      <a href='{{route('index')}}'>hasierako orrira
      </a> joan.
    </p>
    <p>Aukera duzu 
      <a href='http://docs.polr.me/'>docs
      </a> edo 
      <a href='//github.com/cydrobolt/polr'>README
      </a> irakurtzeko.
    </p>
    <p>Laguntza behar baduzu edo zalantzaren bat baduzu, jarri harremanetan gurekin IRC bidez (
      <a href='//webchat.freenode.net/?channels=#polr'>
        <code>#polr
        </code>
      </a>) freenode-n.
    </p>
    <p>Eskerrik asko Polr erabiltzeagatik!
    </p>
  </div>
  <div class='col-md-3'>
  </div>
</div>@endsection
