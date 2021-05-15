<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nueva Cotización</title>
</head>

<body>
    <p>¡Hola! Tenemos un nueva Cotización para ti.</p>
    <p>Estos son los datos del usuario que ha realizado el registro:</p>
    <ul>
        <li>Nombre: {{ $quotation->name }}</li>
        <li>Celular: {{ $quotation->cellphone_number }}</li>
        <li>Email: {{ $quotation->email }}</li>
        <li>Fecha: {{ $quotation->date }}</li>
    </ul>
    <p>Modelo del Vehículo a cotizar: {{ $quotation->car_model }}</p>
</body>

</html>