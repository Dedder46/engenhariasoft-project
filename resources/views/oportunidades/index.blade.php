<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Oportunidades</title>
</head>
<body>
    <h1>Oportunidades Disponíveis</h1>

    <!-- Formulário de Filtros -->
    <form method="GET" action="{{ route('oportunidades.index') }}">
        <label for="urgencia">Urgência:</label>
        <select name="urgencia" id="urgencia">
            <option value="">Selecione</option>
            <option value="Baixa" {{ (request('urgencia') == 'Baixa') ? 'selected' : '' }}>Baixa</option>
            <option value="Média" {{ (request('urgencia') == 'Média') ? 'selected' : '' }}>Média</option>
            <option value="Alta" {{ (request('urgencia') == 'Alta') ? 'selected' : '' }}>Alta</option>
        </select>

        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="localizacao" value="{{ request('localizacao') }}" placeholder="Ex.: Lisboa">

        <label for="modo_trabalho">Modo de Trabalho:</label>
        <select name="modo_trabalho" id="modo_trabalho">
            <option value="">Selecione</option>
            <option value="Presencial" {{ (request('modo_trabalho') == 'Presencial') ? 'selected' : '' }}>Presencial</option>
            <option value="Híbrido" {{ (request('modo_trabalho') == 'Híbrido') ? 'selected' : '' }}>Híbrido</option>
            <option value="Remoto" {{ (request('modo_trabalho') == 'Remoto') ? 'selected' : '' }}>Remoto</option>
        </select>

        <button type="submit">Filtrar</button>
    </form>

    <!-- Lista de Oportunidades -->
    <h2>Resultados</h2>
    @if($oportunidades->isEmpty())
        <p>Nenhuma oportunidade encontrada.</p>
    @else
        <ul>
            @foreach($oportunidades as $oportunidade)
                <li>
                    <h3>{{ $oportunidade->titulo }}</h3>
                    <p><strong>Urgência:</strong> {{ $oportunidade->urgencia }}</p>
                    <p><strong>Localização:</strong> {{ $oportunidade->localizacao }}</p>
                    <p><strong>Modo de Trabalho:</strong> {{ $oportunidade->modo_trabalho }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>