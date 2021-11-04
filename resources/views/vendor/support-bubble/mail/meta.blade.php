<h3>Meta</h3>
<ul>
@if($name)
<li><strong>Nome</strong>: {{ $name }}</li>
@endif
@if($email)
<li><strong>E-mail</strong>: {{ $email }}</li>
@endif
@if($subject)
<li><strong>Oggetto</strong>: {{ $subject }}</li>
@endif
@if($url)
<li><strong>Indirizzo</strong>: {{ $url }}</li>
@endif
@if($ip)
<li><strong>IP-address</strong>: {{ $ip }}</li>
@endif
@if($userAgent)
<li><strong>User-agent</strong>: {{ $userAgent }}</li>
@endif
</ul>
