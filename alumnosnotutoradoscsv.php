<?php
//realizamos la conexion a la base de datos
include("conexion.php");
//realizamo la consulta a la base de datos
$query = $con->query("select T.Cod_Alumno,T.Nombres 
                      from tutoria T 
                      where not exists ( 
                      select A.Cod_Alumno 
                      from alumno A 
                      where T.Cod_Alumno = A.Cod_Alumno )");
//
if($query->num_rows > 0){
   //identificamos el delimitador de excel
    $delimiter = ";";
    //indicamos el nombre y fecha del archivo csv
    $filename = "Alumnos No Matriculados" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    //cabeceras en el formato
    $fields = array('CODIGO', 'NOMBRES');
    fputcsv($f, $fields, $delimiter);
    //generamos los datos de la consulta para el archivo csv
    while($row = $query->fetch_assoc()){
        //los datos generados de la consulta son el codigo y nombre del alumno
        $lineData = array($row['Cod_Alumno'], $row['Nombres']);
        fputcsv($f, $lineData, $delimiter);
    }
    //finalizamos la configuracion del documento csv
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);
}
exit;

?>