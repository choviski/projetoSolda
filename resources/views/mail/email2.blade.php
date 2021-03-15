@component('mail::message')
    <h1>SUA CONTA FOI CRIADA</h1>
    <p>
        Olá {{$dado->nome}}, sua conta acaba de ser criada no sistema da infoSolda, para acessa-la use o
        <br>
        email: {{$dado->email}}
        <br>
        e a senha: {{$dado->senha}}
    </p>
    @component('mail::button')
        Acessar!
    @endcomponent
@endcomponent

