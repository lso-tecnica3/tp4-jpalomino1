<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Inscripción de Alumno</title>
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
        .alert-custom {
            font-size: 1.2rem;
            border-radius: 10px;
            padding: 20px;
        }
        .btn-custom {
            background-color: #ff6347; /* Tomate */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #ff4500; /* Naranja rojo */
        }
        .btn-link-custom {
            color:rgb(32, 167, 201);
        }
        .btn-link-custom:hover {
            color: #007bff;
        }
        .header-text {
            color:rgb(82, 102, 192);
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }
        .footer-text {
            font-size: 1rem;
            color: #6c757d;
            text-align: center;
            margin-top: 40px;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-text">¡Bienvenido a la Inscripción!</h1>

    <?php
        function ultimoId () {
                $file= fopen("alumnos.csv", "r");
                $con =0;
                while (!feof($file)){
                    $linea= fgetcsv($file);
                    $con++;
                }
            
                fclose($file);
                return $con-1;
            }
            function validacionDatos($datoNombre){
                if ($datoNombre==""){
                    return false;
                }
                else {
                    return true;
                }
            }
            function validacionDni($dni){
                
                if (strlen($dni)== 8 ){
                    return true;
                }
                else {
                    return false;
                }
            }
            function validacionTel($tel){
                if (strlen($tel)== 10 or  strlen($tel)== 11){
                    return true;
                }
                else {
                    return false;
                }
            }
            function validacionFinal ($nombre, $apellido,$dni,$localidad,$telefono){
                $con=0;
                if (validacionDatos($nombre)==false){
                    $con = 1;
                }
                if (validacionDatos($apellido)==false){
                    $con = 2;
                }
                if (validacionDni($dni)== false){
                    $con = 3;
                    }
                if (validacionDatos($localidad)==false){
                    $con = 4;
                }
                if (validacionTel($telefono) == false ){
                    $con=5;
                }
                if ($con > 0){
                    return false;
                }
                else {
                    return true;
                }
            }
            $file= fopen("alumnos.csv", "a");
            $id_preinscripcion = ultimoId();
            $nombre= $_GET['nombre'];
            $apellido=$_GET['apellido'];
            $dni= $_GET['dni'];
            $localidad= $_GET['localidad'];
            $telefono= $_GET['telefono'];
            $colegio= $_GET['colegio'];
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fecha_hora= date("d-m-Y H:i:s");
            if (validacionFinal ($nombre, $apellido,$dni,$localidad,$telefono)== false){
                print ("Para inscribir necesita completar bien los datos");
                print ("<a href='index.html'> Llenar datos</a>");
            }
            else{
                $datos= [$id_preinscripcion, $nombre,$apellido,$dni,$localidad,$telefono,$colegio,$fecha_hora];
                fputcsv($file,$datos);
                print("Datos ingresados correctamente");
                print ("<a href='index.html'> Volver a cargar otro alumno</a>");

            }
            fclose($file);
            
            
            

    ?>
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
    