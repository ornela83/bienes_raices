<?php

// Importar la conexion
require "include/config/database.php";
$db = conectarDB();

// Crear un email y password
$email = "correo@correo.com";
$password = '123456';

// Hasheamos el password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//var_dump($passwordHash);

// Query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

//echo $query;

// Agregarlo a la base de datos

mysqli_query($db, $query);

?>