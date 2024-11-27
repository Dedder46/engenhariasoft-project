<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard da Empresa</title>
</head>
<body>
    <h1>Bem-vindo, {{ auth()->user()->name }}</h1>
    <p>Você está no painel de controle da empresa.</p>
    <ul>
        <li><a href="{{ route('oportunidades.create') }}">Criar Nova Oportunidade</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>