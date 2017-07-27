<table class="table table-hover">
    <tr>
        <th>Final do link</th>
        <th>Versión longa do link</th>
        <th>Clicks</th>
        <th>Data</th>
        @if ($role == 'admin')
        <th>Creado por</th>
        @endif
        <th>Deshabilitar</th>
        <th>Eliminar</th>


    </tr>
    @foreach ($links as $link)
    <tr>
        <td>
            @if (!empty($link->secret_key))
                {{$link->short_url}}/{{$link->secret_key}}
            @else
                {{$link->short_url}}
            @endif

        </td>
        <td class='wrap-text'>
            <a href='{{$link->long_url}}'>
                {{str_limit($link->long_url, 50, '...')}}
            </a>
        </td>
        <td>{{$link->clicks}}</td>
        <td>{{$link->created_at}}</td>
        @if ($role == 'admin')
        <td>{{$link->creator}}</td>
        @endif

        <td>
            <a ng-click="toggleLink($event, '{{$link->short_url}}')" class='btn btn-sm @if($link->is_disabled) btn-success @else btn-danger @endif'>
                @if ($link->is_disabled)
                Habilitar
                @else
                Deshabilitar
                @endif
            </a>
        </td>

        <td>
            <a ng-click="deleteLink($event, '{{$link->short_url}}')"
                class='btn btn-sm btn-warning delete-link'>
                Eliminar
            </a>
        </td>


    </tr>
    @endforeach
</table>
