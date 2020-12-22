<?php
/*
$bd = 'db732478360';
$usuario = 'dbo732478360';
$pass = '123456789';
$host = 'db732478360.db.1and1.com';
*/

//Our MySQL user account.
define('MYSQL_USER', 'root');

//Our MySQL password.
define('MYSQL_PASSWORD', 'root');

//The server that MySQL is located on.
define('MYSQL_HOST', 'localhost');

//The name of our database.
define('MYSQL_DATABASE', 'rack');

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);



$bd = 'rack';
$usuario = 'root';
$pass = 'root';
$host = 'localhost';
$mysqli = new mysqli($host, $usuario, $pass, $bd);

if ($mysqli->connect_errno)
{
	echo "Error de conexion: (" . $conexion->connect_errno .") " . $conexion->connect_error;
}

 ?>
