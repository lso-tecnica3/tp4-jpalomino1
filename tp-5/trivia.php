<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trivia</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@600;700&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
            color: #1d3557;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #1d3557;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 6px rgba(255,255,255,0.6);
        }
        form {
            background: rgba(255,255,255,0.85);
            max-width: 700px;
            margin: 0 auto;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(70, 130, 180, 0.3);
        }
        p strong {
            font-size: 1.1rem;
            display: block;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        input[type="radio"] {
            margin-right: 8px;
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #1d3557;
            border: none;
            font-weight: 600;
            color: #fff;
            padding: 10px 30px;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(29, 53, 87, 0.7);
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 30px auto 0 auto;
        }
        input[type="submit"]:hover {
            background-color: #3a5068;
            box-shadow: 0 6px 14px rgba(58, 80, 104, 0.9);
        }
    </style>
</head>
<body>

<?php
    $nombre_trivia = $_GET['archivo']; // reecibo el archivo por URL porq
    $file = fopen("trivias/" . $nombre_trivia, "r");

    $nombre = fgetcsv($file); //  título de la trivia
    print "<h3>$nombre[0]</h3>";

    print '<form action="correccion.php" >';
    print '<input type="hidden" name="archivo" value="' . $nombre_trivia . '">';
    $con = 1;
    while (!feof($file)) {
        $linea = fgetcsv($file);
        
        if (!empty($linea)) {
            print "<p><strong>$linea[0]</strong></p>"; 
            print '<input type="radio" name="respuesta' . $con . '" value="' . $linea[1] . '" checked> ' . $linea[1] . '<br>';
            print '<input type="radio" name="respuesta' . $con . '" value="' . $linea[2] . '"> ' . $linea[2] . '<br>';
            print '<input type="radio" name="respuesta' . $con . '" value="' . $linea[3] . '"> ' . $linea[3] . '<br>';
            print '<input type="hidden" name="correcta' . $con . '" value="' . $linea[4] . '">';

            $con++;
        }
    }

    fclose($file);

    print '<input type="submit" value="Enviar respuestas">';
    print '</form>';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
