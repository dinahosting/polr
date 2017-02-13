@extends('layouts.base') 
@section('css')
<link rel='stylesheet' href='/css/signup.css' />
@endsection @section('content')
<div class='col-md-6'>
  <h2 class='title'>Erregistroa
  </h2>
  <form action='{{route('psignup')}}' method='POST'>Erabiltzaile-izena: 
    <input type='text' name='username' class='form-control form-field' placeholder='Erabiltzaile-izena' />Pasahitza: 
    <input type='password' name='password' class='form-control form-field' placeholder='Pasahitza' />Helbide elektronikoa: 
    <input type='email' name='email' class='form-control form-field' placeholder='Helbide elektronikoa' />
    <input type="hidden" name='_token' value='{{csrf_token()}}' />
    <input type="submit" class="btn btn-default btn-success" value="ERREGISTRATU"/>
    <p class='login-prompt'>
      <small>Baduzu dagoeneko kontu bat? 
        <a href='{{route('login')}}'>Saioa hasi
        </a>
      </small>
    </p>
  </form>
</div>
<div class='col-md-6 hidden-xs hidden-sm'>
  <div class='right-col-one'>
    <h4>Erabiltzaile-izena
    </h4>
    <p>{{env('APP_NAME')}} aplikazioan saioa hasteko erabiliko duzun erabiltzaile-izena.
    </p>
    </p>
  <div class='right-col-next'>
    <div class='right-col'>
      <h4>Pasahitza
      </h4>
      <p>{{env('APP_NAME')}} aplikazioan saioa hasteko erabiliko duzun pasahitz segurua.
      </p>
      </p>
  </div>
  <div class='right-col-next'>
    <h4>Helbide elektronikoa
    </h4>
    <p>Zure kontua egiaztatzeko edo berreskuratzeko erabiliko duzun helbide elektronikoa.
    </p>
    </p>
</div>
@endsection
