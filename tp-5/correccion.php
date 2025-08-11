<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Corrección Trivia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
            color: #1d3557;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .alert {
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(70, 130, 180, 0.3);
            margin-bottom: 20px;
        }
        .btn-volver {
            background-color: #1d3557;
            color: white;
            font-weight: 600;
            padding: 10px 30px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(29, 53, 87, 0.5);
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-volver:hover {
            background-color: #3a5068;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
<?php
    for ($x = 1; $x <= 3; $x++) {
        $respuesta = $_GET["respuesta$x"] ?? '';
        $correcta  = $_GET["correcta$x"]  ?? '';

        if ($respuesta === $correcta) {
            print '<div class="alert alert-success" role="alert">';
            print "La pregunta numero $x es correcta<br>";
            print '</div>';
        } else {
            print '<div class="alert alert-danger" role="alert">';
            print "La pregunta numero $x es incorrecta<br>";
            print '</div>';
        }
    }
?>

<a href="index.html" class="btn-volver">Volver al Inicio</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
