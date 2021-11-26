<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Connexion</title>

    <?php


if(isset($_POST['submit']))
{   
    $login=htmlspecialchars($_POST['login']);
    $password=sha1($_POST['password']);
    if(!empty($login) && !empty($password))
    {
        
        $bdd=mysqli_connect('localhost','root', '',"moduleconnexion");
        $log = mysqli_query($bdd, 'SELECT * FROM utilisateurs WHERE login ="'.$login.'" && password="'.$password.'"');
        $rows=mysqli_num_rows($log);
        
        if($rows==1){
            session_start();
            $_SESSION['login'] = $login;
            
            header('location: profil.php');

             }else echo "nom d'utilisateur ou mot de passe incorrect";


    }else echo"veuillez saisir tout saisir les champs";


}



?>
</head>

<body>
<header>
<?php 
        include("header.php");
        ?>
        


    </header>
<main>
    <h1>CONNEXION</h1>
    
        <form action="#" method="post">
            
            <label for="name">login :</label>
            <input type="text" id="login" name="login">
            
            <label for="pasword">password:</label>
            <input type="password" id="password" name="password">
         
            
            <input type="submit" name="submit" value="valider!" class ="bte">
            
        </form>

</main>
</body>

<style>
h1{
        margin-left:43%;
        font-size:120%;
    }

form{
background-color: rgba(200,0,0,0.6);
        padding: 2% 2% 2% 2%;
        width: 30%;
        border-radius:30%;
        box-shadow:5px 5px 5px black;
        margin-left: 30%;
}
.bte{
    margin:5% 0 0 40%;
    
}

</style>
</html>