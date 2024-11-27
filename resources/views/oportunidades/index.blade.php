<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oportunidades Disponíveis</title>
</head>
<body>
    <h1>Oportunidades Disponíveis</h1>

    @if($oportunidades->isEmpty())
        <p>Não há oportunidades disponíveis no momento.</p>
    @else
        <ul>
            @foreach($oportunidades as $oportunidade)
                <li>
                    <h2>{{ $oportunidade->titulo }}</h2>
                    <p><strong>Descrição:</strong> {{ $oportunidade->descricao }}</p>
                    <p><strong>Localização:</strong> {{ $oportunidade->localizacao }}</p>
                    <p><strong>Tipo de Trabalho:</strong> {{ $oportunidade->tipo_trabalho }}</p>
                    <p><strong>Modo de Trabalho:</strong> {{ $oportunidade->modo_trabalho }}</p>
                    <p><strong>Urgência:</strong> {{ $oportunidade->urgencia }}</p>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('dashboard') }}">Voltar ao Dashboard</a>
</body>
</html>
