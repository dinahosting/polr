@extends('layouts.base') @section('css')
<link rel='stylesheet' href='css/index.css' />@endsection @section('content')
<div id='logos'>
    <a href="https://dinahosting.com/" target="_blank">
        <img class='dinalogo' src="img/logos/dinahosting.svg" alt="Dinahosting SL">
    </a><a href="http://www.domeinuak.eus/" target="_blank">
        <img class='euslogo' src="img/logos/puntueus.png" alt=".EUS">
    </a>
</div>
<div id='titleDiv'>
  <!-- Font: !Sketchy Times
  LICENSE: {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/fonts/sketchytimes/LICENSE.txt -->
  <h1 class='title'>{{env('APP_NAME')}}</h1>
</div>

<div class="row">
  <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
    <form method='POST' action='/shorten' role='form' style="overflow: hidden;" class="formulario">
      <div class="inputBackground">
        <div id='tips' class='text-muted tips'>
          <i class='fa fa-spinner'>
          </i> Iradokizunak kargatzen...
        </div>
        <div class="col-md-10 col-sm-10">
          <input type='text' autocomplete="off" class='form-control long-link-input' placeholder='http://' value='' name='link-url' />
        </div>
        <div class="col-md-2 col-sm-2">
          <input type='submit' class='btn btn-info btn-acortador' id='shorten' value='' />
        </div>
        <div>
          <a href='#' class='linkOptions' id='show-link-options'>Esteken aukerak</a>
        </div>
      </div>
      <div class='row' id='options'>
        <p class='optionPadding'>Pertsonalizatu esteka
        </p>@if (!env('SETTING_PSEUDORANDOM_ENDING')) {{-- Kontagailuan oinarritutako bukaera erabiltzen bada bakarrik erakutsi txandakatze sekretua --}}
        <div class='btn-group btn-toggle visibility-toggler' data-toggle='buttons'>
          <label class='btn btn-primary btn-sm active'>
            <input type='radio' name='options' value='p' checked /> Publikoa
          </label>
          <label class='btn btn-sm btn-default'>
            <input type='radio' name='options' value='s' /> Sekretua
          </label>
        </div>@endif
        <div>
          <div class='custom-link-text'>
            <h2 class='site-url-field'>{{env('APP_ADDRESS')}}/
            </h2>
            <input type='text' autocomplete="off" class='form-control custom-url-field' name='custom-ending' />
          </div>
          <div class="divAvailability">
            <a href='#' class='btn btn-success btn-xs check-btn buttonSpaceTop' id='check-link-availability'>Egiaztatu erabilgarritasuna
            </a>
            <div id='link-availability-status'>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name='_token' value='{{csrf_token()}}' />
    </form>
  </div>
</div>


<!-- <div class="div-bottom"></div> -->
@endsection @section('js')
<script src='js/index.js'>
</script>@endsection
