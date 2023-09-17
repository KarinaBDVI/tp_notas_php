<?php
// Configuración de la conexión a la base de datos
$dbhost = 'localhost';
$dbuser = 'c2331051_isft';
$dbpass = '48muKOwiwo';
$dbname = 'c2331051_isft';
    
// Crear la conexión
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}