@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/about.css' />
<link rel='stylesheet' href='/css/effects.css' />
@endsection

@section('content')
<!-- <div class='well logo-well'>
    <img class='logo-img' src='/img/logo.png' />
</div> -->

<div class='about-contents'>
    @if ($role == "admin")
    <dl>
        <p>Información do software</p>
        <dt>Versión: {{env('POLR_VERSION')}}</dt>
        <dt>Data de lanzamento: {{env('POLR_RELDATE')}}</dt>
        <dt>Instalación: {{env('APP_NAME')}} en {{env('APP_ADDRESS')}} en {{env('POLR_GENERATED_AT')}}<dt>
    </dl>
    <p>Estás a ver esta información na medida en que fixeches login como persoa administradora.</p>
    @endif

    <p>Ola! É un pracer térmoste aquí!</p>
    <p><strong>i.gal</strong> é unha iniciativa da <a href="http://www.puntogal.org/">Asociación Puntogal</a>, <a href="https://www.agasol.gal/">Agasol</a> e da <a href="https://dinahosting.com">dinahosting</a> para a orgullosa internet do Pobo Galego. Desexamos que a goces tanto coma nós ao levar o proxecto adiante. Agardamos que che resulte útil no teu día a día. Graciñas!</p>

    <p>{{env('APP_NAME')}} baséase en Polr 2, unha plataforma minimalista de código aberto para encurtar URL.
       Descobre moito máis sobre o proxecto <a href='https://github.com/Cydrobolt/polr'>na súa páxina de Github</a> ou no seu <a href="//project.polr.me">sitio web</a>.
        <br />Polr is licensed under the GNU GPL License.
    </p>
</div>
<a href='#' class='btn btn-success license-btn'>Máis información</a>
<pre class="license" id="gpl-license">
Copyright (C) 2013-2016 Chaoyi Zha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
</pre>

@endsection

@section('js')
<script src='/js/about.js'></script>
@endsection
