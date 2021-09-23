<?php

	$serveur="localhost";
	$login="root";
	$pass="";

function dbConnexion() {
    try{
        $conn = new PDO("mysql:host=localhost;dbname=tchat", "root", "");
    } catch(PDOExeption $e) {
        echo $e -> getMessage();
    }

    return $conn;
}
?>