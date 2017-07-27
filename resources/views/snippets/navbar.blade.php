<div class="container-fluid">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Output sign in/sign out buttons appropriately -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">{{env('APP_NAME')}}</a>
        </div>

        <ul id="navbar" class="nav navbar-collapse collapse navbar-nav" id="nbc">
            <li><a href="about">Sobre</a></li>
            <li class="visible-xs"><a href="{{route('login')}}">Rexistro</a></li>
            <li class="visible-xs"><a href="{{route('admin')}}">Panel</a></li>
        </ul>
        <ul id="navbar" class="nav pull-right navbar-nav hidden-xs">
            <li class="divider-vertical"></li>

            @if (empty(session('username')))
                @if (env('POLR_ALLOW_ACCT_CREATION') == true)
                    <li><a href="{{route('signup')}}">Rexistro</a></li>
                @endif
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Acceso <strong class="caret"></strong></a>
                <div class="dropdown-menu pull-right login-dropdown-menu" id="dropdown">
                    <h2>Acceso</h2>
                    <form action="login" method="POST" accept-charset="UTF-8">
                        <input type="text" name="username" placeholder='Usuario' size="30" class="form-control login-form-field" />
                        <input type="password" name="password" placeholder='Contrasinal' size="30" class="form-control login-form-field" />
                        <input type="hidden" name='_token' value='{{csrf_token()}}' />
                        <input class="btn btn-success form-control login-form-submit" type="submit" name="login" value="Acceder" />
                    </form>
                </div>
            </li>
            @else
            <div class='nav pull-right navbar-nav' style='color: white'>
                <li class='dropdown'>
                <a class="dropdown-toggle login-name" href="#" data-toggle="dropdown">{{session('username')}} <strong class="caret"></strong></a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="{{route('admin')}}">Panel</a></li>
                        <li><a tabindex="-1" href="{{route('admin')}}#settings">Opcións</a></li>
                        <li><a tabindex="-1" href="{{route('logout')}}">Sair</a></li>
                    </ul>
                </li>
            </div>
            @endif

        </ul>
    </nav>
</div>
