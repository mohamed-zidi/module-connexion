<?php


if (isset($_POST['submit'])) {   
    $login = htmlspecialchars($_POST['login']);
    $username = htmlspecialchars($_POST['prenom']);
    $name = htmlspecialchars($_POST['nom']);
    $password = sha1($_POST['password']);
    $repeatpassword = sha1($_POST['repeatpassword']);
    
    if (!empty($login) && !empty($username) && !empty($name) && !empty($password) && !empty($repeatpassword)) {
        if ($password == $repeatpassword) {
            $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion') or die('erreur');
            $user_insert = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES('$login', '$name' ,'$username','$password');";
            $query = mysqli_query($bdd, $user_insert);
            die("inscription terminé. <a href= 'connexion.php'> connectez vous </a>.");
        } else echo "mots de passe erroné";
    } else echo "veuillez saisir tout les champs";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    
    <title>Inscription</title>
</head>

<body>
    <header>
        <?php
        include('header.php');

        ?>


    </header>
    <h1>INSCRIPTION</h1>
    <div >
        <form action="#" method="post">
            <table class= tab_inscrip>

            <tr>
            <td><label for="login">login:</label></td>
            <td><input type="text" id="name" name="login"></td>
            </tr>
            <tr>
            <td><label for="prenom">prénom:</label></td>
            <td><input type="text" id="prenom" name="prenom"></td>
            </tr>
            <tr>
            <td><label for="nom">nom:</label></td>
            <td><input type="text" id="nom" name="nom"></td>
            </tr>
            <tr>
            <td><label for="pasword">password:</label></td>
            <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
            <td><label for="repeatpasword">confirm the password:</label></td>
            <td><input type="password" id="repeatpassword" name="repeatpassword"></td>
            </tr>

            </table>
            <input type="submit" name="submit" value="valider!"> 
        </form>
    </div>
</body>

<style>
    h1{
        margin-left:43%;
        font-size:120%;
    }
    div{
        background-color: rgba(200,0,0,0.6);
        padding: 2% 2% 2% 2%;
        width: 30%;
        border-radius:30%;
        box-shadow:5px 5px 5px black;
        margin-left: 30%;
    }
</style>
</html>