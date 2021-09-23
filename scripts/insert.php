<?php

require('./db.php');
$email = $_POST['email'];
$pass = $_POST['password'];


function insert($email, $pass) {
    $db = dbConnexion();
    try {
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt -> execute([$email]);
        
        if( $stmt->rowCount() > 0 ) {
            echo"
            <script>
                alert('Utilisateur deja dans le systeme');
                window.location.replace('../view/creer.php');
            </script>
           ";
        } else {
            $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $db -> prepare("INSERT INTO users VALUES(?,?,?)");
            $stmt -> execute([null, $email, $pass]);
            header("Location: ../view/connexion.php");
        }
      
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

insert($email, $pass);

?>