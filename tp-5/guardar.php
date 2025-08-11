<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Guardado Trivia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
            color: #1d3557;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            flex-direction: column;
        }
        .mensaje {
            background: rgba(255,255,255,0.85);
            border-radius: 15px;
            padding: 30px 40px;
            box-shadow: 0 8px 24px rgba(70, 130, 180, 0.3);
            max-width: 600px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 600;
            border: 2px solid #1d3557;
            margin-bottom: 25px;
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
        }
        .btn-volver:hover {
            background-color: #3a5068;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
    $consigna_1= [
        $_GET['pregunta1'],
        $_GET['opcion1_1'],
        $_GET['opcion2_1'],
        $_GET['opcion3_1'],
        $_GET['respuesta1']
    ];
    $consigna_2= [
        $_GET['pregunta2'],
        $_GET['opcion1_2'],
        $_GET['opcion2_2'],
        $_GET['opcion3_2'],
        $_GET['respuesta2']
    ];
    $consigna_3= [
        $_GET['pregunta3'],
        $_GET['opcion1_3'],
        $_GET['opcion2_3'],
        $_GET['opcion3_3'],
        $_GET['respuesta3']
    ];
    $consigna_4 = [
        $_GET['pregunta4'],
        $_GET['opcion1_4'],
        $_GET['opcion2_4'],
        $_GET['opcion3_4'],
        $_GET['respuesta4']
    ];

    $consigna_5 = [
        $_GET['pregunta5'],
        $_GET['opcion1_5'],
        $_GET['opcion2_5'],
        $_GET['opcion3_5'],
        $_GET['respuesta5']
    ];

    $nombre_trivia = trim($_GET['nombre_trivia']);
    $f = fopen("trivias/" . $nombre_trivia . ".csv", "w");
    fputcsv($f, [$nombre_trivia]);
    fputcsv($f, $consigna_1);
    fputcsv($f, $consigna_2);
    fputcsv($f, $consigna_3);
    fputcsv($f, $consigna_4);
    fputcsv($f, $consigna_5);

    fclose($f);

    echo '<div class="mensaje">Los datos fueron ingresados correctamente.</div>';
?>
<a href="index.html" class="btn-volver">Volver al Inicio</a>
</body>
</html>
