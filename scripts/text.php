<?php
session_start();

require('./db.php');

$msg = $_POST['msg'];
$id = $_POST['id'];
$acteur = $_SESSION['id'];

echo $acteur;

function insert($msg, $id, $acteur) {
    $db = dbConnexion();
    try {

        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $db -> prepare("INSERT INTO message VALUES(?,?,?,?)");
            $stmt -> execute([null, $msg, $acteur, $id]);
            header("Location: ../view/tchat.php?id="."<?=".$id."?>");
      
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

insert($msg, $id, $acteur);

?>