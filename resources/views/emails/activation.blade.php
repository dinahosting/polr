<h3>Ola {{$username}}!</h3>

<p>Obrigado por te rexistrares en {{env('APP_NAME')}}. Para usares a túa conta,
precisas activala facendo click no link a seguir:</p>

<br />

<a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}'>
    {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}
</a>

<br />

<p>Obrigado,</p>
<p>A Equipa Dinahosting.</p>

--
<br />
Recibiches este correo porque alguén co IP {{$ip}} rexistrou unha conta en
{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}. Se non foches ti,
podes ignorar este email.
