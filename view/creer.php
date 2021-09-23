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
            height: 230px;
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
        </style>
</head>

<body>

<main class="main">
    <h1>Tchat App / Creation</h1>

    <div class="btn">
        <form method="post" action="../scripts/insert.php" class="form">
            <input type="text" placeholder="email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <button type="submit"><a>Creer</a></button>
        </form>
        <div id="foot">
        <a id="a" href="./connexion.php">Pas de compte? creer un compte</a>
        <a id="a" class="acc" href="../">Accueil</a>
        </div>
    </div>


</main>
   
</body>
</html>