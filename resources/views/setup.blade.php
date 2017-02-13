@extends('layouts.minimal') @section('title') Konfigurazioa @endsection @section('css')
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
    <form class='setup-form' method='POST' action='/setup'>
      <h4>Datu-basearen konfigurazioa
      </h4>
      <p>Datu-basearen ostalaria:
      </p>
      <input type='text' class='form-control' name='db:host' value='localhost'>
      <p>Datu-basearen ataka:
      </p>
      <input type='text' class='form-control' name='db:port' value='3306'>
      <p>Datu-basearen erabiltzaile-izena:
      </p>
      <input type='text' class='form-control' name='db:username' value='root'>
      <p>Datu-baserako pasahitza:
      </p>
      <input type='password' class='form-control' name='db:password' value='password'>
      <p>Datu-basearen izena:
        <button data-content="Name of existing database. You must create the Polr database manually." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <input type='text' class='form-control' name='db:name' value='polr'>
      <h4>Aplikazioaren ezarpenak
      </h4>
      <p>Aplikazioaren izena:
      </p>
      <input type='text' class='form-control' name='app:name' value='Polr'>
      <p>Aplikazioaren protokoloa:
      </p>
      <input type='text' class='form-control' name='app:protocol' value='http://'>
      <p>Aplikazioaren URLa (Polr-rako bide-izena, http:// edo amaierako barra gabe):
      </p>
      <input type='text' class='form-control' name='app:external_url' value='yoursite.com'>
      <p>Laburtze-baimenak:
      </p>
      <select name='setting:shorten_permission' class='form-control'>
        <option value='false' selected='selected'>Edonork laburtu ditzake URLak
        </option>
        <option value='true'>URLak laburtu ahal izateko, saioa hasia izan behar da
        </option>
      </select>
      <p>Erakutsi interfaze publikoa:
      </p>
      <select name='setting:public_interface' class='form-control'>
        <option value='true' selected='selected'>Erakutsi interfaze publikoa (lehenetsia)
        </option>
        <option value='false'>Ezkutatu interfaze publikoa (laburtzaile pribatuentzat)
        </option>
      </select>
      <p>Interfaze publikoa ezkutuan badago, desbideratu indize-orria hona:
        <button data-content="Required if public interface is hidden. To use Polr, login by directly heading to yoursite.com/login first." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <input type='text' class='form-control' name='setting:index_redirect' placeholder='http://your-main-site.com'>
      <p class='text-muted'>Desbideratze bat gaituz gero, http://yoursite.com/login gunera joan beharko duzu indize-orrira sartu ahal izateko.
      </p>
      <p>URLaren bukaera mota lehenetsia:
        <button data-content="If you choose to use pseudorandom strings, you will not have the option to use a counter-based ending." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <select name='setting:pseudor_ending' class='form-control'>
        <option value='false' selected='selected'>Erabili base62 edo base32 kontagailua (laburragoa, baina aurreikusteko errazagoa; adibidez, 5a)
        </option>
        <option value='true'>Erabili ia zorizko kateak (luzeagoak dira, baina asmatzen zailagoak; adibidez, 6LxZ3j)
        </option>
      </select>
      <p>URLaren bukaeraren oinarria:
        <button data-content="This will have no effect if you choose to use pseudorandom endings." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <select name='setting:base' class='form-control'>
        <option value='32' selected='selected'>32 -- letra minuskulak eta zenbakiak (lehenetsia)
        </option>
        <option value='62'>62 -- letra minuskulak, maiuskulak eta zenbakiak
        </option>
      </select>
      <h4>Administratzailearen kontu-ezarpenak
        <button data-content="These credentials will be used for your admin account in Polr." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </h4>
      <p>Administratzailearen erabiltzaile-izena:
      </p>
      <input type='text' class='form-control' name='acct:username' value='polr'>
      <p>Administratzailearen helbide elektronikoa:
      </p>
      <input type='text' class='form-control' name='acct:email' value='polr@admin.tld'>
      <p>Administratzailearen pasahitza:
      </p>
      <input type='password' class='form-control' name='acct:password' value='polr'>
      <h4>SMTParen ezarpenak
        <button data-content="Required only if the email verification or password recovery features are enabled." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </h4>
      <p>SMTP zerbitzaria:
      </p>
      <input type='text' class='form-control' name='app:smtp_server' placeholder='smtp.gmail.com'>
      <p>SMTP ataka:
      </p>
      <input type='text' class='form-control' name='app:smtp_port' placeholder='25'>
      <p>SMTPko erabiltzaile-izena:
      </p>
      <input type='text' class='form-control' name='app:smtp_username' placeholder='example@gmail.com'>
      <p>SMTP pasahitza:
      </p>
      <input type='password' class='form-control' name='app:smtp_password' placeholder='password'>
      <p>SMTP nork:
      </p>
      <input type='text' class='form-control' name='app:smtp_from' placeholder='example@gmail.com'>
      <p>SMTP igorlearen izena:
      </p>
      <input type='text' class='form-control' name='app:smtp_from_name' placeholder='noreply'>
      <h4>APIaren ezarpenak
      </h4>
      <p>API anonimoa:
      </p>
      <select name='setting:anon_api' class='form-control'>
        <option selected value='false'>Desaktibatuta -- erabiltzaile erregistratuek bakarrik erabil dezakete APIa
        </option>
        <option value='true'>Aktibatuta -- API gakoaren eskaera hutsak onartzen dira
        </option>
      </select>
      <p>APIa automatikoki esleituta:
      </p>
      <select name='setting:auto_api_key' class='form-control'>
        <option selected value='false'>Desaktibatuta -- administratzaileek eskuz gaitu behar dute erabiltzaile bakoitzaren APIa
        </option>
        <option value='true'>Aktibatuta -- erabiltzaile bakoitzak API gako bat jasotzen du erregistratzean
        </option>
      </select>
      <h4>Beste ezarpen batzuk
      </h4>
      <p>Erregistratzea:
        <button data-content="Enabling registration allows any user to create an account." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <select name='setting:registration_permission' class='form-control'>
        <option value='none'>Erregistratzea desgaituta
        </option>
        <option value='email'>Gaituta. Helbide elektronikoa egiaztatu behar da
        </option>
        <option value='no-verification'>Gaituta. Ez da helbide elektronikoa egiaztatu behar
        </option>
      </select>
      <p>Pasahitza berreskuratzea:
        <button data-content="Password recovery allows users to reset their password through email." type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?
        </button>
      </p>
      <select name='setting:password_recovery' class='form-control'>
        <option value='false'>Pasahitza berreskuratzeko aukera desgaituta dago
        </option>
        <option value='true'>Pasahitza berreskuratzeko aukera gaituta dago
        </option>
      </select>
      <p class='text-muted'>Ziurtatu SMTPa behar bezala konfiguratuta dagoela, pasahitza berreskuratzeko aukera gaitu aurretik.
      </p>{{-- 
      <p>Erroari dagokion bide-izena (utzi hutsik / bada; http://site.com/polr bada, idatzi /polr/):
      </p>
      <input type='text' class='form-control' name='path' placeholder='/polr/' value=''> --}}
      <p>Gaia (
        <a href='https://github.com/cydrobolt/polr/wiki/Themes-Screenshots'>pantaila-argazkiak
        </a>):
      </p>
      <select name='app:stylesheet' class='form-control'>
        <option value=''>Modernoa (lehenetsia)
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cyborg/bootstrap.min.css'>Gau-erdiko beltza
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/united/bootstrap.min.css'>Laranja
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/simplex/bootstrap.min.css'>Zuri argia
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/darkly/bootstrap.min.css'>Gau hodeitsua
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cerulean/bootstrap.min.css'>Zeru lasaiak
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css'>Android-en material-diseinua
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/superhero/bootstrap.min.css'>Metro urdina
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css'>Hareharria
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cyborg/bootstrap.min.css'>Azabatxe-beltza
        </option>
        <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css'>Egunkariak
        </option>
      </select>
      <div class='setup-form-buttons'>
        <input type='submit' class='btn btn-success' value='Install'>
        <input type='reset' class='btn btn-warning' value='Clear Fields'>
      </div>
      <input type="hidden" name='_token' value='{{csrf_token()}}' />
    </form>
  </div>
  <div class='col-md-3'>
  </div>
</div>
<div class='setup-footer well'>Polr 
  <a href='https://opensource.org/osd' target='_blank'>kode irekiko software
  </a> bat da, eta 
  <a href='//www.gnu.org/copyleft/gpl.html'>GPLv2+ lizentzia
  </a> du.
  <div>Polr-en {{env('VERSION')}} bertsioa. Argitalpen-data: {{env('VERSION_RELMONTH')}} {{env('VERSION_RELDAY')}}, {{env('VERSION_RELYEAR')}} - 
    <a href='//github.com/cydrobolt/polr' target='_blank'>Github
    </a>
    <div class='footer-well'>&copy; Copyrighta {{env('VERSION_RELYEAR')}} 
      <a class='footer-link' href='//cydrobolt.com' target='_blank'>Chaoyi Zha
      </a> &amp; 
      <a class='footer-link' href='//github.com/Cydrobolt/polr/graphs/contributors' target='_blank'>other Polr contributors
      </a>
    </div>
  </div>
</div>@endsection @section('js')
<script src="/js/bootstrap.min.js">
</script>
<script src='/js/setup.js'>
</script>@endsection
