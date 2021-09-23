<?php
session_start();

require('./db.php');
$email = $_POST['email'];
$pass = $_POST['pass'];


function connectcheck($email, $pass) {
    $db = dbConnexion();
    try {
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $db -> prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt -> execute([$email, $pass]);

        $result = $stmt -> fetchAll();

        $count = $stmt -> rowCount();

       if( $count !=0 ) {
       
        for($i=0; $i < count($result); $i++){
            
            $_SESSION['user'] = $result[$i]["username"];
            $_SESSION['id'] = $result[$i]["id"];
            header('Location: ../view/tchat.php?id=0000');
        }

       } else {
           echo"
            <script>
                alert('Impossible de se connecter');
                window.location.replace('../view/connexion.php');
            </script>
           ";
       }
        //header("Location: ../view/connexion.php");
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

connectcheck($email, $pass);

?>