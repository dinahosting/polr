@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/admin.css' />
@endsection

@section('content')
<div ng-controller="AdminCtrl" class="ng-root panel-admin">
    <div class='col-md-2'>
        <ul class='nav nav-pills nav-stacked admin-nav' role='tablist'>
            <li role='presentation' aria-controls="home" class='admin-nav-item active'><a href='#home'>Principal</a></li>
            <li role='presentation' aria-controls="links" class='admin-nav-item'><a href='#links'>Links</a></li>
            <li role='presentation' aria-controls="settings" class='admin-nav-item'><a href='#settings'>Configuración</a></li>

            @if ($role == 'admin')
            <li role='presentation' class='admin-nav-item'><a href='#admin'>Administrador</a></li>
            <li role='presentation' class='admin-nav-item'><a href='#users'>Usuarios</a></li>
            @endif

            @if ($api_active == 1)
            <li role='presentation' class='admin-nav-item'><a href='#developer'>Desenvolvedor</a></li>
            @endif
        </ul>
    </div>
    <div class='col-md-10'>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <h2> Damosche as boasvindas ao teu panel de {{env('APP_NAME')}}!</h2>
                <p>Usa os links da esquerda para navegares polo teu panel de {{env('APP_NAME')}}.</p>
            </div>

            <div role="tabpanel" class="tab-pane" id="links">
                @include('snippets.link_table', [
                    'links' => $user_links
                ])

                {!! $user_links->fragment('links')->render() !!}
                {{-- Add search functions --}}
            </div>

            <div role="tabpanel" class="tab-pane" id="settings">
                <h3>Mudar contrasinal</h3>
                <form action='/admin/action/change_password' method='POST'>
                    Contrasinal vello: <input class="form-control password-box" type='password' name='current_password' />
                    Contrasinal novo: <input class="form-control password-box" type='password' name='new_password' />
                    <input type="hidden" name='_token' value='{{csrf_token()}}' />
                    <input type='submit' class='btn btn-success change-password-btn'/>
                </form>
            </div>

            @if ($role == 'admin')
            <div role="tabpanel" class="tab-pane" id="admin">
                <h3>Links</h3>

                @include('snippets.link_table', [
                    'links' => $admin_links
                ])

                {!! $admin_links->fragment('admin')->render() !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="users">
                <h3>Usuarios</h3>
                @include('snippets.user_table', [
                    'users' => $admin_users
                ])

                {!! $admin_users->fragment('users')->render() !!}

            </div>
            @endif

            @if ($api_active == 1)
            <div role="tabpanel" class="tab-pane" id="developer">
                <h3>Desenvolvedor</h3>

                <p>API keys e documentación para desenvolvedores.</p>
                <p>
                    Documentación:
                    <a target="_blank" href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/apidoc/'>{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/apidoc/</a>
                </p>

                <h4>API Key: </h4>
                <div class='row'>
                    <div class='col-md-8'>
                        <input class='form-control status-display' readonly type='text' value='{{$api_key}}'>
                    </div>
                    <div class='col-md-4'>
                        <a href='#' ng-click="generateNewAPIKey($event, '{{$user_id}}', true)" id='api-reset-key' class='btn btn-danger'>Reiniciar</a>
                    </div>
                </div>


                <h4>Cuota para o API: </h4>
                <h2 class='api-quota'>
                    @if ($api_quota == -1)
                        unlimited
                    @else
                        <code>{{$api_quota}}</code>
                    @endif
                </h2>
                <span> peticións por minuto</span>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection

@section('js')
{{-- Include modal templates --}}
@include('snippets.modals')

{{-- Include extra JS --}}
<script src='/js/handlebars-v4.0.5.min.js'></script>
<script src='/js/api.js'></script>
<script src='/js/AdminCtrl.js'></script>

{{-- Extra templating --}}
<script id="api-modal-template" type="text/x-handlebars-template">
    <div>
        <p>
            <span>API Activa</span>:

            <code class='status-display'>
                @{{#if api_active}}Sí@{{else}}Non@{{/if}}</code>

            <a ng-click="toggleAPIStatus($event, '@{{user_id}}')" class='btn btn-xs btn-success'>mudar</a>
        </p>
        <p>
            <span>API Key: </span><code class='status-display'>@{{api_key}}</code>
            <a ng-click="generateNewAPIKey($event, '@{{user_id}}', false)" class='btn btn-xs btn-danger'>reiniciar</a>
        </p>
        <p>
            <span>API Cuta (req/min, -1 para ilimitado):</span> <input type='number' class='form-control api-quota' value='@{{api_quota}}'>
            <a ng-click="updateAPIQuota($event, '@{{user_id}}')" class='btn btn-xs btn-warning'>mudar</a>
        </p>
    </div>
</script>

@endsection
