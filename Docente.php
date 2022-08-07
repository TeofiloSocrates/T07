<?php
include("conexion.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tutoria 2022 - I</title>
  <link rel="stylesheet" media="all" href="Estilos/style.css" />
</head>
<body>
  <center>
<div class="Cont">
<div class="cab"><h2 style="padding-top: 10px;">Sistema de Tutoria 2022 - I</h2></div>
<nav class="slidemenu">
  <!-- Item 1 -->
  <input type="radio" name="slideItem" id="slide-item-1" class="slide-toggle"/>
  <label for="slide-item-1"><p class="icon">☑</p><a href="index.php"><span>Alumnos 2022 - I Matriculados</span></a></label>
  <!-- Item 2 -->
  <input type="radio" name="slideItem" id="slide-item-2" class="slide-toggle" checked/>
  <label for="slide-item-2"><p class="icon">★</p><a href="Docente.php"><span>Docentes</span></a></label>
  <!-- Item 3 -->
  <input type="radio" name="slideItem" id="slide-item-3" class="slide-toggle"/>
  <label for="slide-item-3"><p class="icon">☒</p><a href="AlumnosNN.php"><span>Alumnos No Matriculados</span></a></label>
  <!-- Item 4 -->
  <input type="radio" name="slideItem" id="slide-item-4" class="slide-toggle"/>
  <label for="slide-item-4"><p class="icon">✎</p></a><a href="Tutorias.php"><span>Tutorias</span></a></label>
  
  <div class="clear"></div>
  
  <!-- Bar -->
  <div class="slider">
    <div class="bar"></div>
  </div>
</nav>
<div class="boton">
    <button name="button" class="btn">Exportar a CSV</button>
</div>
<br>
<hr class="linea">
  <?php
        $consulta = "select * from docente ORDER by Nombres";
        $Docente = mysqli_query($con, $consulta);
        if ($Docente){
            echo "<center><table class='lista' cellpadding='0' cellspacing='0' width=500px;>";
            echo "<tr><th class='tabladocente'>Nro</th><th class='tabladocente'>Nombres</th><th class='tabladocente'>Categoria</th></tr>";
            //$clase = '"Celdalogin"';
            $contador = 1;
            while (($fila = mysqli_fetch_assoc($Docente)) != null){
                $Nombres = $fila['Nombres'];
                $Categoria = $fila['Categoria'];
                echo "<tr>";
                echo "<td class='cnro'>$contador</td>";
                echo "<td class='cnombres'>$Nombres</td>";
                echo "<td class='ccategoria'>$Categoria</td>";
                echo "</tr>";
                $contador = $contador + 1;
            }
            echo "</table><br>";
        }
        else{
            echo "<script>alert('No hay alumnos ....')</script>";
        }
        
  ?>
</div>
</div>
<div class="pie">
</body>
</html>