<?php
include("conexion.php");
$query = $con->query("select * from docente ORDER by Nombres");

if($query->num_rows > 0){
    $delimiter = ";";
    $filename = "Docentes" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    $fields = array('NOMBRES', 'CATEGORIA');
    fputcsv($f, $fields, $delimiter);
    while($row = $query->fetch_assoc()){
        $lineData = array($row['Nombres'], $row['Categoria']);
        fputcsv($f, $lineData, $delimiter);
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);
}
exit;

?>