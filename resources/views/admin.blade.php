@extends('layouts.base')
@section('css')
<link rel='stylesheet' href='/css/admin.css' />@endsection @section('content')
<div ng-controller="AdminCtrl" class="ng-root panel-admin">
  <div class='col-md-2'>
    <ul class='nav nav-pills nav-stacked admin-nav' role='tablist'>
      <li role='presentation' aria-controls="home" class='admin-nav-item active'>
        <a href='#home'>Hasi</a>
      </li>
      <li role='presentation' aria-controls="links" class='admin-nav-item'>
        <a href='#links'>Estekak</a>
      </li>
      <li role='presentation' aria-controls="settings" class='admin-nav-item'>
        <a href='#settings'>Ezarpenak</a>
      </li>
      @if ($role == 'admin')
        <li role='presentation' class='admin-nav-item'>
          <a href='#admin'>Administratzailea</a>
        </li>
        <li role='presentation' class='admin-nav-item'>
          <a href='#users'>Erabiltzaileak</a>
        </li>
      @endif
      @if ($api_active == 1)
        <li role='presentation' class='admin-nav-item'>
          <a href='#developer'>Garatzailea
          </a>
        </li>
      @endif
    </ul>
  </div>
  <div class='col-md-10'>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <h2>Ongi etorri {{env('APP_NAME')}} aplikazioaren arbelera!
        </h2>
        <p>Erabili ezkerraldeko estekak, {{env('APP_NAME')}} aplikazioaren arbelean nabigatzeko.
        </p>
      </div>
      <div role="tabpanel" class="tab-pane" id="links">@include('snippets.link_table', [ 'links' => $user_links ]) {!! $user_links->fragment('links')->render() !!} {{-- Gehitu bilaketa-funtzioak --}}
      </div>
      <div role="tabpanel" class="tab-pane" id="settings">
        <h3>Aldatu pasahitza
        </h3>
        <form action='/admin/action/change_password' method='POST'>Pasahitz zaharra: 
          <input class="form-control password-box" type='password' name='current_password' />Pasahitz berria: 
          <input class="form-control password-box" type='password' name='new_password' />
          <input type="hidden" name='_token' value='{{csrf_token()}}' />
          <input type='submit' class='btn btn-success change-password-btn'/>
        </form>
      </div>@if ($role == 'admin')
      <div role="tabpanel" class="tab-pane" id="admin">
        <h3>Estekak
        </h3>@include('snippets.link_table', [ 'links' => $admin_links ]) {!! $admin_links->fragment('admin')->render() !!}
      </div>
      <div role="tabpanel" class="tab-pane" id="users">
        <h3>Erabiltzaileak
        </h3>@include('snippets.user_table', [ 'users' => $admin_users ]) {!! $admin_users->fragment('users')->render() !!}
      </div>
      @endif @if ($api_active == 1)
      <div role="tabpanel" class="tab-pane" id="developer">
        <h3>Garatzailea
        </h3>
        <p>Garatzaileentzako APIaren gakoak eta dokumentazioa.
        </p>
        <p>Dokumentazioa: 
          <a target='_blank' href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/apidoc/'>{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/apidoc/</a>
        </p>
        <h4>APIaren gakoa: 
        </h4>
        <div class='row'>
          <div class='col-md-8'>
            <input class='form-control status-display' disabled type='text' value='{{$api_key}}'>
          </div>
          <div class='col-md-4'>
            <a href='#' ng-click="generateNewAPIKey($event, '{{$user_id}}', true)" id='api-reset-key' class='btn btn-danger'>Berrezarri
            </a>
          </div>
        </div>
        <h4>APIaren kuota: 
        </h4>
        <h2 class='api-quota'>@if ($api_quota == -1) mugagabea @else 
          <code>{{$api_quota}}
          </code> @endif
        </h2>
        <span> eskaera minutuko
        </span>
      </div>@endif
    </div>
  </div>
</div>@endsection @section('js') {{-- Sartu modu-txantiloiak --}} @include('snippets.modals') {{-- Sartu JS gehigarriak --}}
<script src='/js/handlebars-v4.0.5.min.js'>
</script>
<script src='/js/api.js'>
</script>
<script src='/js/AdminCtrl.js'>
</script>{{-- Txantiloi gehigarriak --}}
<script id="api-modal-template" type="text/x-handlebars-template">
    <div>
        <p>
            <span>API Aktiboa</span>:
            <code class='status-display'>
                @{{#if api_active}}True@{{else}}False@{{/if}}</code>
            <a ng-click="toggleAPIStatus($event, '@{{user_id}}')" class='btn btn-xs btn-success'>toggle</a>
  </p>
        <p>
            <span>APIaren gakoa: </span><code class='status-display'>@{{api_key}}</code>
            <a ng-click="generateNewAPIKey($event, '@{{user_id}}', false)" class='btn btn-xs btn-danger'>reset</a>
  </p>
        <p>
            <span>APIaren kuota: (req/min, -1: mugagabea):</span> <input type='number' class='form-control api-quota' value='@{{api_quota}}'>
            <a ng-click="updateAPIQuota($event, '@{{user_id}}')" class='btn btn-xs btn-warning'>change</a>
  </p>
  </div>
</script>@endsection
