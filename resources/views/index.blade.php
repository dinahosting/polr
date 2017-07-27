@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/index.css' />
@endsection

@section('content')

<ul id='logos' class="logos-list">
    <li>
        <a href="http://dominio.gal/" target="_blank">
            <img class='logo40' src="/img/logos/puntogal.png" alt="Asociación Puntogal" title="Asociación Puntogal">
        </a>
    </li>
    <li>
        <a href="https://dinahosting.com/" target="_blank">
            <img class='logo40' src="/img/logos/dinahosting.svg" alt="Dinahosting SL" title="Dinahosting SL">
        </a></li>
    <li>
        <a href="https://www.agasol.gal/" target="_blank">
            <img class='logo40' src="/img/logos/agasol.png" alt="AGASOL" title="AGASOL: Asociación de Empresas Galegas de Software Libre">
        </a>
    </li>
</ul>

<div id='titleDiv'>
    <h1 class='title'><img src="/img/logo.png" alt="{{env('APP_NAME')}}"></h1>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">

        <form method='POST' action='/shorten' role='form' style="overflow: hidden;" class="formulario">
            <div class="inputBackground">
                <div id='tips' class='text-muted tips'>
                    <i class='fa fa-spinner'></i> Cargando Suxerencias...
                </div>
                <div class="col-md-10 col-sm-10">
                    <input type='text' autocomplete="off" class='form-control long-link-input' placeholder='http://' value='' name='link-url' />
                </div>
                <div class="col-md-2 col-sm-2">
                    <input type='submit' class='btn btn-info btn-acortador' id='shorten' value='' />
                </div>
                <div>
                    <a href='#' class='linkOptions' id='show-link-options'>Opcións para o link</a>
                </div>
            </div>
            <div class='row' id='options'>
                <p class='optionPadding'>Personalizar link
                </p>@if (!env('SETTING_PSEUDORANDOM_ENDING'))
                <div class='btn-group btn-toggle visibility-toggler' data-toggle='buttons'>
                    <label class='btn btn-primary btn-sm active'>
                        <input type='radio' name='options' value='p' checked /> Público
                    </label>
                    <label class='btn btn-sm btn-default'>
                        <input type='radio' name='options' value='s' /> Privado
                    </label>
                </div>@endif
                <div>
                    <div class='custom-link-text'>
                        <h2 class='site-url-field'>{{env('APP_ADDRESS')}}/
                        </h2>
                        <input type='text' autocomplete="off" class='form-control custom-url-field' name='custom-ending' />
                    </div>
                    <div class="divAvailability">
                        <a href='#' class='btn btn-success btn-xs check-btn buttonSpaceTop' id='check-link-availability'>Comprobar dispoñibilidade</a>
                        <div id='link-availability-status'></div>
                    </div>
                </div>
            </div>
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
        </form>
    </div>
</div>


<!-- <div class="div-bottom"></div> -->
@endsection @section('js')

<script src='js/index.js'></script>

@endsection
