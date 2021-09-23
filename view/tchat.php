<!DOCTYPE>
<?php
session_start();
?>


<html>
<head>
    <style>
        body, html {
            padding: 0;
            margin: 0;
        }
        .main {
            width: 80%;
            margin-left: 8%;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .btn{
            width: 100%;
            height: 300px;
            background-color: #0e2431;
            padding: 2rem;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        a{
            text-decoration: none;
            color: #ff6363;
            font-size: 20px;
            font-family: Century;
            width: 100%;
        }
        button {
            height: 40px;
            /* border-radius: 10px; */
        }

        input {
            
        }
        .form {
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }
        input{
            height: 40px;
            margin-bottom: 1rem;
            color: #ff6363;
            padding: 1rem;
            border-radius: 10px;
        }

        #a{
            font-size: 15px;
        }
        .acc{
            float: left;
            padding-bottom: 1.5rem;
        }
        .users h2 {
            color: #fff;
        }
        
        #message {
            width: 100%;
            height: 80px;
            margin-top: -10px;
            padding: 0.5rem;
            font-size: 15px;
            color: #0e2431;
            border-top: none;
            resize: none;
        }
        #message:focus {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }
        #form {
            display: flex;
            flex-direction: column;
        }
        #tchatavek {
            width: 70%;
            padding: 0.5rem;
            background-color: #234;
            border-radius: 10px;
            overflow:auto;
        }
        #acteur {
            float: right;
            margin: 0;
            padding: 0;
            background-color:#FFE4B5;
            border-radius: 5px;
        } 

        #recep {
            font-size: 187x;
            float: left;
            margin: 0;
            padding: 0;
            background-color:#fff;
            border-radius: 5px;
        }
        #tchatit {
            width: 85%;
            margin-left: 8%;
           
        }
       
        #tchatavek p {
            width: auto;
            font-size: 20px;
           padding-left: 1rem;
           padding-right: 1rem;
           padding-top: 0.5rem;
           padding-bottom: 0.2rem;
        }
        
        </style>
</head>

<body>

<main class="main">
    <h1>Tchat App / <?php echo $_SESSION['user']; ?></h1>
 <div class="btn">
     <div class="users">
         <h2>Utilisateur</h2>
         <?php
    require('../scripts/db.php');

function all() {

    $db = dbConnexion();

    try {
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM users WHERE id != ?");
        $stmt -> execute([$_SESSION['id']]);
        
        $allUsers = $stmt -> fetchAll();

        foreach ($allUsers as $row) {
            print  "<form> <a href='?id=<?=$row[id]?>'  >". $row['username'] ."</a></form>";
        //echo $allUsers[$i]['username'];
       }
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

all();

?>
    </div>

    <div id="tchatavek">
    <?php

function othermessage() {
$db = dbConnexion();

    try {
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM message WHERE auteur=? AND recepteur = ? OR auteur = ? AND recepteur = ?");
        $stmt -> execute([  $_SESSION['id'], $_GET['id'][3], $_GET['id'][3], $_SESSION['id'] ]);
        
        $allUsers = $stmt -> fetchAll();
        foreach ($allUsers as $row) {

    
           if($_SESSION['id'] == $row['auteur']) {
                echo '<p id="acteur">'.$row['msg'].'</p></br></br>';
           } else {
                echo '<p id="recep">'.$row['msg'].'</p></br></br>';
           }
        
       }
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

othermessage();

?>
    <?php

function message() {
$db = dbConnexion();

    try {
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM message WHERE auteur=? AND recepteur=?");
        $stmt -> execute([$_SESSION['id'], $_GET['id'][3]]);
        
        $allUsers = $stmt -> fetchAll();

        foreach ($allUsers as $row) {
           
        echo '<p id="acteur">'.$row['msg'].'</p></br></br>';
       }
    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}

// message();
//#234;
?>
 </div>
</main>

<div id="tchatit">
    
    <form method="post" action="../scripts/text.php" id="form">
        <textarea  placeholder="Write your Message here" id="message" name="msg" required></textarea><br>
        <input type="text" style="display:none;" value="<?php echo $_GET['id'][3]; ?>" name="id" />
        <button type="submit"><a>Send</a></button>
		 <button> <a id="a" class="acc" href="connexion.php">Retour</a></button>

    </form>
</div>

</body>
</html>

