<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        /* Estilos globais */
        body {
            font-family: Arial, sans-serif;
            background-color: #18192B;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #D9D9D9;
        }

        /* Estilos do formulário */
        form {
            max-width: 500px;
            margin: 40px auto;
            padding: 40px;
            background-color: #2F2C3E;
            border: 1px solid #555;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #D9D9D9;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #2F2C3E;
            color: #D9D9D9;
        }

        button[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #D9D9D9;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .error ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>
        <button type="submit">Registrar</button>
    </form>

    @if ($errors->any())
        <div class="error">
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>

