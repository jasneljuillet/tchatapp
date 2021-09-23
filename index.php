<!DOCTYPE>

<html>
<head>
    <style>
        h1{
            font-family: Georgia;
            text-transform: uppercase;
        }
        .main {
            width: 50%;
            margin-left: 15%;
            padding: 5rem;
            display: flex;
            flex-direction: column;
        }

        .btn{
            width: 100%;
            height: 200px;
            background-color: #0e2431;
            padding: 2rem;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            border-radius: 10px;
        }
        </style>
</head>

<body>

<main class="main">
    <h1>Tchat App</h1>

    <div class="btn">
        <button><a href="./view/creer.php">Creer un compte</a></button>
        <button><a href="./view/connexion.php">Connexion</a></button>
    </div>
</main>
   
</body>
</html>