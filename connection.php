<?php
$servername = "localhost"; // ← تم تعديل هذا السطر
$username = "life_path";  
$password = "LifePath141912"; 
$dbname = "life_path"; 

$database = new mysqli($servername, $username, $password, $dbname);

if ($database->connect_error) {
    die("Échec de la connexion : " . $database->connect_error);
}
?>
