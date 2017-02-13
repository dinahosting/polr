<table class="table table-hover">
  <tr>
    <th>Erabiltzaile-izena
    </th>
    <th>Helbide elektronikoa
    </th>
    <th>Sortze-data
    </th>
    <th>Aktibatuta
    </th>
    <th>APIa
    </th>
    <th>Gehiago
    </th>
  </tr>@foreach ($users as $user)
  <tr>
    <td class='wrap-text'>{{$user->username}}
    </td>
    <td class='wrap-text'>{{$user->email}}
    </td>
    <td>{{$user->created_at}}
    </td>
    <td>{{$user->active ? 'true' : 'false'}}
    </td>
    <td>
      @if ($user->active)
        <a  class='activate-api-modal btn btn-sm btn-info'
           ng-click="openAPIModal($event, '{{$user->username}}', '{{$user->api_key}}', '{{$user->api_active}}', '{{$user->api_quota}}', '{{$user->id}}')">API</a>
      @else
        N/A
      @endif
    </td>
    <td>
      <a  ng-click="deleteUser($event)" class='btn btn-sm btn-danger @if (session('username') == $user->username)disabled @endif' data-user-id='{{$user->id}}'> Delete
         </a>
    </td>
  </tr>@endforeach
</table>
