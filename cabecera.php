<?php
//realizamo la conexiond a la base de datos
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
<!-- Etiquetamos opciones para la barra de navegacion del sistema --> 
<nav class="slidemenu">
  <!-- Item 1 : Opcion para mostrar los alumnos matriculados en el semestre-->  
  <input type="radio" name="slideItem" id="slide-item-1" class="slide-toggle" />
  <label for="slide-item-1"><p class="icon">☑</p><a href="index.php"><span> Alumnos 2022 - I</span></a></label>  
  <!-- Item 2 : Opcion para mostrar a los docentes designados para tutoria-->
  <input type="radio" name="slideItem" id="slide-item-2" class="slide-toggle" />
  <label for="slide-item-2"><p class="icon">★</p><a href="Docente.php"><span>Docentes</span></a></label>  
  <!-- Item 3 : Opcion para mostrar los alumnos que no estan asignados a tutoria-->
  <input type="radio" name="slideItem" id="slide-item-3" class="slide-toggle"/>
  <label for="slide-item-3"><p class="icon">☒</p><a href="AlumnosNoMatriculados.php"><span>Alumnos No Matriculados</span></a></label>  
  <!-- Item 4 : Opcion para mostrar los alumnos con sus respectivos tutores-->
  <input type="radio" name="slideItem" id="slide-item-4" class="slide-toggle" />
  <label for="slide-item-4"><p class="icon">✎</p></a><a href="Tutorias.php"><span>Tutorias</span></a></label>  
  <div class="clear"></div>  
  <!-- Barra deslizante -->
  <div class="slider">
    <div class="bar"></div>
  </div>
</nav>