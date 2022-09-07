<?php
include("cabecera.php");
?>
<div class="boton">
    <button name="button" class="btn"><a href="tutoradoscsv.php">Generar CSV</a></button>
    <p style="font-weight: bold;">Tutorias</p> 
</div>
<br>
<hr class="linea">
  <?php
      //creamos una variable para que cotenga la consulta a la base de datos
      //realiamos la consulta para obtener la lista de alumnos con sus respectivos tutores
        $consulta =   "select T.Cod_Alumno,T.Nombres, D.Nombres as Docente
                        FROM tutoria T, docente D
                        WHERE T.Cod_Docente=D.Cod_Docente";
        $Tutoria = mysqli_query($con, $consulta);
        //creamos una tabla para mostrar las tutorias
        echo "<center><table class='lista' cellpadding='0' cellspacing='0' width=500px;>";
        echo "<tr><th class='tabladocente'>Nro</th><th class='tabladocente'>Codigo</th><th class='tabladocente'>Nombres</th><th class='tabladocente'>Docente</th></tr>";
        $contador = 1;
        //realizamos un bucle para mostrar los datos de cada alumno con su respectivo tutor
        //primero se recupera en la variable $ArregloTutoria en forma de arreglo
        while (($ArregloTutoria = mysqli_fetch_assoc($Tutoria)) != null){
            $Codigo = $ArregloTutoria['Cod_Alumno'];
            $Nombres = $ArregloTutoria['Nombres'];
            $Docente = $ArregloTutoria['Docente'];
            //mostramos los datos recuperados del alumno y su tutor en cada fila de la tabla
            echo "<tr>";
            echo "<td class='cnro'>$contador</td>";
            echo "<td class=''>$Codigo</td>";
            echo "<td class=''>$Nombres</td>";
            echo "<td class=''>$Docente</td>";
            echo "</tr>";
            $contador = $contador + 1;
        }
          echo "</table><br>";
  ?>
</div>
</body>
</html>