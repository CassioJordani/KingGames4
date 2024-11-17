<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Estilos globais */
        body {
            font-family: Arial, sans-serif;
            background-color: #18192B;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        /* Estilos do formulário */
        .form-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 40px;
            background-color: #2F2C3E;
            border: 1px solid #2F2C3E;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #2F2C3E;
            color: #fff;
        }

        .form-container button[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        /* Estilos de erro */
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
    <h1>Login</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>

