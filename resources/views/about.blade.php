@extends('layouts.base')
@section('css')
<link rel='stylesheet' href='/css/about.css' />
<link rel='stylesheet' href='/css/effects.css' />@endsection @section('content') 
<!-- <div class='well logo-well'>
<img class='logo-img' src='/img/logo.png' />
</div> -->
<div class='about-contents'>@if ($role == 'admin')
  <dl>
    <p>Konpilazio-informazioa
    </p>
    <dt>Bertsioa: {{env('POLR_VERSION')}}
    </dt>
    <dt>Argitalpen-data: {{env('POLR_RELDATE')}}
    </dt>
    <dt>Instalatutako aplikazioa: {{env('APP_NAME')}}, {{env('APP_ADDRESS')}}, {{env('POLR_GENERATED_AT')}}
    <dt>
      </dl>
    <p>Administratzaile gisa hasi duzu saioa, eta horregatik ikusten duzu goiko informazio hori.
    </p>@endif
    <p>Kaixo! Oso pozik gaude hemen zaudelako!
    </p>
    <p>
      <a href="http://www.domeinuak.eus/eu/">PuntuEus Fundazioaren
      </a> eta 
      <a href="https://dinahosting.com">dinahosting
      </a>-en ekimen bat da 
      <strong>labur.eus
      </strong>, euskararen herriaren Interneti harrotasunez eskainia. Espero dugu ekimen honekin gozatu dugun bezainbeste gozatzea zuk ere plataforma erabiltzen. Egunerokoan erabilgarria izatea nahiko genuke. Eskerrik asko.
    </p>
    <p>Polr 2-k garatu du {{env('APP_NAME')}} aplikazioa. Estekak laburtzeko plataforma minimalista bat da Polr 2, eta kode irekia erabiltzen du. Informazio gehiago behar baduzu, ikusi 
      <a href='https://github.com/Cydrobolt/polr'>haren GitHub orria
      </a> edo 
      <a href="//project.polr.me">proiektuaren gunea
      </a>. 
      <br />Polr-ek GNU GPL lizentzia du.
    </p>
    </div>
  <a href='#' class='btn btn-success license-btn'>Informazio gehiago
  </a>
  <pre class="license" id="gpl-license">Copyright (C) 2013-2016 Chaoyi Zha.

Programa hau software librekoa da; berriro banatu edo aldatu egin dezakezu GNU lizentzia publiko orokorrei jarraiki,
Free Software Foundation-ek argitaratutakoaren arabera, bai lizentziaren 2. bertsioa, bai beste bertsio berriagoren bat (nahi baduzu).

Programa hau erabilgarria izango den esperantzarekin banatzen da,baina EZ DU BAT ERE BERMERIK, ez MERKATURATZEKO berme inpliziturik,
ez eta HELBURU JAKIN BATERAKO EGOKITASUN-bermerik ere. Xehetasun gehiago izateko, ikusi GNU lizentzia publiko orokorra.

GNU lizentzia publiko orokorraren kopia bat jasoko zenuen programa honekin batera. Jaso ez baduzu, idatzi helbide honetara:
Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
</pre>@endsection @section('js')
  <script src='/js/about.js'>
  </script>@endsection
