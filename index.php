<?php
include("../Librerias/cabecera.php");
?>
<div class="boton">
    <button name="button" class="btn"><a href="alumnoscsv.php">Generar CSV</a></button>
    <p style="font-weight: bold;">Alumnos Matriculados</p> 
</div>
<br>
<hr class="linea">
  <?php
      //creamos una variable para que cotenga la consulta a la base de datos
      //realiamos la consulta para obtener la lista de alumnos matriculados en el semestre
        $consulta = "select * from alumno ORDER BY Nombres";
        $Alumno = mysqli_query($con, $consulta);
        //si existe datos en la consulta
        if ($Alumno){
          //creamos una tabla para mostrar la lista de alumnos en el interfaz
            echo "<center><table class='lista' cellpadding='0' cellspacing='0' width=500px;>";
            echo "<tr><th class='tabladocente'>Nro</th><th class='tabladocente'>Codigo</th><th class='tabladocente'>Nombres</th></tr>";
            $contador = 1;
            //realizamos un bucle para mostrar los datos de cada alumno en la tabla
            //primero se recupera en la variable $ArregloAlumnos en forma de arreglo
            while (($ArregloAlumnos = mysqli_fetch_assoc($Alumno)) != null){
              //recuperamos datos del alumno(codigo y nombre) en el arreglo obtenido
                $Codigo = $ArregloAlumnos['Cod_Alumno'];
                $Nombres = $ArregloAlumnos['Nombres'];
                //mostramos los datos recuperados del alumno en cada fila de la tabla
                echo "<tr>";
                echo "<td class='cnro'>$contador</td>";
                echo "<td class=''>$Codigo</td>";
                echo "<td class=''>$Nombres</td>";
                echo "</tr>";
                $contador = $contador + 1;
            }
            echo "</table><br>";
        }
        //en caso de que no haya datos con la consulta realizada nos muestra un mesaje de alerta en la pantalla
        else{
            echo "<script>alert('No hay alumnos ....')</script>";
        }        
  ?>
</div>
</div>
</body>
</html>