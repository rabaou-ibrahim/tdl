<?php

// Dans cette page on se connecte à notre base de données. 
// Il suffira d'utiliser un include ou require_once
// pour utiliser ce code dans le reste des fichiers.

// Connexion à la base de données (pas pour Plesk)

$servername = "localhost";
$username = "rabaou5";
$password = "Starter-2022";
$dbname = "rabaou-ibrahim_todolist";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Echec de connexion " . $conn->connect_error);
}

?>
