<?php
include("conexion.php");
$query = $con->query("select T.Cod_Alumno,T.Nombres 
                      from tutoria T 
                      where not exists ( 
                      select A.Cod_Alumno 
                      from alumno A 
                      where T.Cod_Alumno = A.Cod_Alumno )");

if($query->num_rows > 0){
    $delimiter = ";";
    $filename = "Alumnos No Matriculados" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    $fields = array('CODIGO', 'NOMBRES');
    fputcsv($f, $fields, $delimiter);
    while($row = $query->fetch_assoc()){
        $lineData = array($row['Cod_Alumno'], $row['Nombres']);
        fputcsv($f, $lineData, $delimiter);
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);
}
exit;

?>