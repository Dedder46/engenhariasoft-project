<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <h1>Registrar</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirme a senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <label for="role">role:</label>
            <select name="role" id="role" required>
            <option value="Aluno">Aluno</option>
            <option value="Empresa">Empresa</option>
            </select>
        </div>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>