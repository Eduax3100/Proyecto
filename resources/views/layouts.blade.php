<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tienda de Productos')</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f4f4f4; 
        }
        .container { 
            max-width: 900px; 
            margin: 20px auto; 
            background: white; 
            padding: 20px; 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
            border-radius: 10px;
        }
        h1 { text-align: center; color: #333; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: center; 
        }
        th { background-color: #333; color: white; }
        nav { 
            background: #222; 
            padding: 15px; 
            text-align: center; 
        }
        nav a { 
            color: white; 
            text-decoration: none; 
            margin: 0 15px; 
            font-size: 16px; 
        }
        a { 
            text-decoration: none; 
            color: #007BFF; 
            font-weight: bold; 
        }
        a:hover { color: #0056b3; }
        button { 
            background: red; 
            color: white; 
            border: none; 
            padding: 7px 10px; 
            cursor: pointer; 
            border-radius: 5px; 
        }
        button:hover { background: darkred; }
        .btn-primary { 
            background: #28a745; 
            color: white; 
            padding: 10px 15px; 
            text-decoration: none; 
            display: inline-block; 
            border-radius: 5px; 
        }
        .btn-primary:hover { background: #218838; }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('clientes.index') }}">Clientes</a>
        <a href="{{ route('proveedores.index') }}">Proveedores</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
