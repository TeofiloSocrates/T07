<?php
include("cabecera.php");
?>
<div class="boton">
    <button name="button" class="btn"><a href="alumnosnotutoradoscsv.php">Generar CSV</a></button>
    <p style="font-weight: bold;">Alumnos No Matriculados</p> 
</div>
<br>
<hr class="linea">
  <?php
      //creamos una variable para que cotenga la consulta a la base de datos
      //realiamos la consulta para obtener la lista de alumnos que no esten matriculados
        $consulta =   "select T.Cod_Alumno,T.Nombres 
                      from tutoria T 
                      where not exists ( 
                      select A.Cod_Alumno 
                      from alumno A 
                      where T.Cod_Alumno = A.Cod_Alumno )";
        $Alumno = mysqli_query($con, $consulta);
        //si existe datos en la consulta
        if ($Alumno){
          //creamos una tabla para mostrar la lista de alumnos q no son matriculados en el interfaz
            echo "<center><table class='lista' cellpadding='0' cellspacing='0' width=500px;>";
            echo "<tr><th class='tabladocente'>Nro</th><th class='tabladocente'>Codigo</th><th class='tabladocente'>Nombres</th></tr>";
            $contador = 1;
            //realizamos un bucle para mostrar los datos de cada alumno con su respectivo tutor
          //primero se recupera en la variable $ArregloalumnosNomatriculados en forma de arreglo
            while (($ArregloalumnosNomatriculados = mysqli_fetch_assoc($Alumno)) != null){
              //recuperamos datos del alumno(codigo y nombre) en el arreglo obtenido
                $Codigo = $ArregloalumnosNomatriculados['Cod_Alumno'];
                $Nombres = $ArregloalumnosNomatriculados['Nombres'];
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
</body>
</html>