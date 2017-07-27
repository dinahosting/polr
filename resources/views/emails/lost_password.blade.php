<h3>Ola {{$username}}!</h3>

<p>
    Podes usar o link a seguir para rexenerar o contrasinal para a túa conta en {{env('APP_NAME')}}.
</p>

<a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/reset_password/{{$username}}/{{$recovery_key}}'>
    {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/reset_password/{{$username}}/{{$recovery_key}}
</a>

<br />

<p>Obrigado,</p>
<p>A Equipa Dinahosting.</p>

--
<br />
Recibiches este email porque alguén co IP {{$ip}} solicitou rexenerar o contrasinal 
para unha conta en {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se non foches ti
podes ignorar este email.

