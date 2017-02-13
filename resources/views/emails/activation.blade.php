<h3>Kaixo, {{$username}}!</h3>

<p>Eskerrik asko {{env('APP_NAME')}} aplikazioan erregistratzeagatik. Zure kontua erabiltzeko, aktibatu egin behar duzu esteka hau sakatuz:</p>

<br /> 

<a href='{{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}'>
    {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}}/activate/{{$username}}/{{$recovery_key}}
</a>


<p>Eskerrik asko.</p>
<p>{{env('APP_NAME')}} aplikazioaren lantaldea.</p>
-- 
<br />

{{$ip}} IPa duen norbait {{env('APP_PROTOCOL')}}{{env('APP_ADDRESS')}} helbideko kontu batean erregistratu da, eta horregatik jaso duzu mezu hau. Zu izan ez bazara, ez egin jaramonik mezu honi.
