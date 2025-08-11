<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Listado de Alumnos</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header-text {
            color: rgb(82, 102, 192);
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }
        .table-container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
        }
        .table thead {
            background-color: rgb(82, 102, 192);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2 class="header-text">Lista de Alumnos Inscritos</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID Preinscripción</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Localidad</th>
                    <th>Teléfono</th>
                    <th>Colegio</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
    <?php
        
        $file =fopen("alumnos.csv", "r");
        fgetcsv($file);
        while (!feof($file)){
            $linea= fgetcsv($file);
            if (!empty($linea)){
                print ("<tr>");
                print_r("<td>". $linea[0] . "</td>" ) ;
                print_r("<td>". $linea[1] . "</td>" ) ;
                print_r("<td>". $linea[2] . "</td>" ) ;
                print_r("<td>". $linea[3] . "</td>" ) ;
                print_r("<td>". $linea[4] . "</td>" ) ;
                print_r("<td>". $linea[5] . "</td>" ) ;
                print_r("<td>". $linea[6] . "</td>" ) ;
                print_r("<td>". $linea[7] . "</td>" ) ;
                print ("</tr>");
            }
            

        }
        fclose($file);
    ?>
    </tbody>
        </table>

        <div class="footer-container">
            <a href="index.html" class="btn-link-custom">Volver al inicio</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>