<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Oportunidade</title>
</head>
<body>
    <h1>Criar Oportunidade</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('oportunidades.store') }}" method="POST">
        @csrf
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <div>
            <label for="competencias">Competências (opcional):</label>
            <input type="text" id="competencias" name="competencias">
        </div>
        <div>
            <label for="tipo_trabalho">Tipo de Trabalho:</label>
            <select id="tipo_trabalho" name="tipo_trabalho" required>
                <option value="Part-time">Part-time</option>
                <option value="Full-time">Full-time</option>
            </select>
        </div>
        <div>
            <label for="modo_trabalho">Modo de Trabalho:</label>
            <select id="modo_trabalho" name="modo_trabalho" required>
                <option value="Presencial">Presencial</option>
                <option value="Híbrido">Híbrido</option>
                <option value="Remoto">Remoto</option>
            </select>
        </div>
        <div>
            <label for="localizacao">Localização:</label>
            <input type="text" id="localizacao" name="localizacao" required>
        </div>
        <div>
            <label for="periodo_trabalho">Período de Trabalho:</label>
            <input type="text" id="periodo_trabalho" name="periodo_trabalho" required>
        </div>
        <div>
            <label for="tipo_contrato">Tipo de Contrato:</label>
            <input type="text" id="tipo_contrato" name="tipo_contrato" required>
        </div>
        <div>
            <label for="urgencia">Urgência:</label>
            <select id="urgencia" name="urgencia" required>
                <option value="Baixa">Baixa</option>
                <option value="Média">Média</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
        <button type="submit">Criar Oportunidade</button>
    </form>
</body>
</html>