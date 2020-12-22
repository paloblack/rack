<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	include ("connect.php");

	$id_proyecto = $_POST["id_proyecto"];
	$id_usuario = $_POST["id_usuario"];
	$proyecto = $_POST["proyecto"];
	$color = $_POST["color"];
	$descripcion = $_POST["descripcion"];

	$con = "UPDATE proyectos SET nombre = '$proyecto', color = '$color', descripcion = '$descripcion' WHERE id ='$id_proyecto'";
	$res = $mysqli->query($con);

	header("Location: ../index.php?id=".$id_usuario."");


 ?>
