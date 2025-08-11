<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Trivias Disponibles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #a8dadc, #457b9d);
      font-family: 'Open Sans', sans-serif;
      color: #1d3557;
      padding: 50px 20px;
      min-height: 100vh;
    }
    h1 {
      text-align: center;
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 40px;
      text-shadow: 0 1px 4px rgba(0,0,0,0.1);
      color: #1d3557;
    }
    .card {
      box-shadow: 0 6px 16px rgba(70, 130, 180, 0.2);
      border: none;
      border-radius: 15px;
      background-color: #f8f9fa;
    }
    .card-title {
      color: #1d3557;
      font-weight: 700;
    }
    .btn-primary {
      background-color: #1d3557;
      border: none;
      font-weight: 600;
    }
    .btn-primary:hover {
      background-color: #3a5068;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Trivias disponibles</h1>
    <div class="row g-4">

      <?php
      $archivos = scandir("trivias");

      for ($x = 2; $x < count($archivos); $x++) {
          $archivo = $archivos[$x];
          $ruta = "trivias/" . $archivo;
          $file = fopen($ruta, "r");
          $titulo = "";
          if ($file !== false) {
              $linea = fgetcsv($file);
              if (!empty($linea)) {
                  $titulo = $linea[0]; 
              }
              fclose($file);
          }

          $link = "trivia.php?archivo=$archivo";

          print "<div class='col-sm-6 col-md-6 col-lg-4'>";
              print "<div class='card h-100'>";
                  print "<div class='card-body'>";
                      print "<h5 class='card-title'>" . htmlspecialchars($titulo) . "</h5>";
                      print "<p class='card-text'>Trivia lista para jugar.</p>";
                      print "<a href='$link' class='btn btn-primary'>Jugar Trivia</a>";
                  print "</div>";
              print "</div>";
          print "</div>";
      }
      
      ?>
    <div class="text-center mt-5">
    <a href="index.html" class="btn btn-primary" 
        style="background-color: #a8dadc; border-color: #a8dadc; color: #1d3557;">
        Volver al inicio
    </a>
    </div>


    </div>
  </div>

</body>
</html>
