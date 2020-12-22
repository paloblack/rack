<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	include ("connect.php");

	$id_perfil = $_POST["id_perfil"];
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$email = $_POST["email"];
	$pass2 = $_POST["pass"];
	$pass = password_hash($pass2, PASSWORD_BCRYPT);


	$con = "UPDATE usuario
		SET nombre = :nombre, apellidos = :apellidos, email = :email, pass= :pass
		WHERE id =:id";
	$statement = $pdo->prepare($con);
	$statement->bindValue(':nombre', $nombre, PDO::PARAM_STR);
	$statement->bindValue(':apellidos', $apellidos, PDO::PARAM_STR);
	$statement->bindValue(':email', $email, PDO::PARAM_STR);
	$statement->bindValue(':pass', $pass, PDO::PARAM_STR);
	$statement->bindValue(':id', $id_perfil, PDO::PARAM_INT);
	$statement->execute();


	header("Location: ../index.php?id=".$id_perfil."");


 ?>
