<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .contenido {
            font-size: 10px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Lista de pedidos</h1>
    <hr>
    <div class="contenido">
        <table>
            <thead>
                <tr>
                    <th>Id Pedido</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Calle</th>
                    <th>Ciudad</th>
                    <th>Cp</th>
                    <th>Estado</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->nombre }}</td>
                        <td>{{ $pedido->apellidos }}</td>
                        <td>{{ $pedido->correo }}</td>
                        <td>{{ $pedido->telefono }}</td>
                        <td>{{ $pedido->calle }}</td>
                        <td>{{ $pedido->ciudad }}</td>
                        <td>{{ $pedido->cp }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ $pedido->producto }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>{{ $pedido->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>