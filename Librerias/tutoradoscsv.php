<?php
include("conexion.php");
$query = $con->query("select T.Cod_Alumno,T.Nombres, D.Nombres as Docente
                        FROM tutoria T, docente D
                        WHERE T.Cod_Docente=D.Cod_Docente");

if($query->num_rows > 0){
    $delimiter = ";";
    $filename = "Tutoria" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    $fields = array('CODIGO ALUMNO', 'NOMBRES','DOCENTE TUTOR');
    fputcsv($f, $fields, $delimiter);
    while($row = $query->fetch_assoc()){
        $lineData = array($row['Cod_Alumno'], $row['Nombres'], $row['Docente']);
        fputcsv($f, $lineData, $delimiter);
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);
}
exit;

?>