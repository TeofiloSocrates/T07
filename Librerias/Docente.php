<?php
include("cabecera.php");
?>

<div class="boton">
    <button name="button" class="btn"><a href="docentecsv.php">Generar CSV</a></button>
    <p style="font-weight: bold;">Docentes</p> 
</div>
<br>
<hr class="linea">
  <?php
      //creamos una variable para que cotenga la consulta a la base de datos
      //realiamos la consulta para obtener la lista de docentes asignados a tutoria
        $consulta = "select * from docente ORDER by Nombres";
        $Docente = mysqli_query($con, $consulta);
        //si existe datos en la consulta
        if ($Docente){
          //creamos una tabla para mostrar la lista de docentes en el interfaz
            echo "<center><table class='lista' cellpadding='0' cellspacing='0' width=500px;>";
            echo "<tr><th class='tabladocente'>Nro</th><th class='tabladocente'>Nombres</th><th class='tabladocente'>Categoria</th></tr>";
            //$clase = '"Celdalogin"';
            $contador = 1;
            //realizamos un bucle para mostrar los datos de cada docente en la tabla
            //primero se recupera en la variable $ArregloDocente en forma de arreglo
            while (($ArregloDocente = mysqli_fetch_assoc($Docente)) != null){
              //recuperamos datos del docente(nombre y categoria) en el arreglo obtenido
                $Nombres = $ArregloDocente['Nombres'];
                $Categoria = $ArregloDocente['Categoria'];
                //mostramos los datos recuperados del docente en cada fila de la tabla
                echo "<tr>";
                echo "<td class='cnro'>$contador</td>";
                echo "<td class='cnombres'>$Nombres</td>";
                echo "<td class='ccategoria'>$Categoria</td>";
                echo "</tr>";
                $contador = $contador + 1;
            }
            echo "</table><br>";
        }
        //en caso de que no haya datos con la consulta realizada nos muestra un mesaje de alerta en la pantalla
        else{
            echo "<script>alert('No hay Docentes ....')</script>";
        }
        
  ?>
</div>
</div>
</body>
</html>