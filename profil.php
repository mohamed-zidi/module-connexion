<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    
    <title>profil</title>
</head>

<body>
    <header>
        <?php include("header.php"); ?>

    </header>

    <main>
        <?php
        $ssLogin = $_SESSION['login'];
        
        if (isset($ssLogin)) { # Si je suis connecté 

            //connexiondb
            $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion') or die('erreur');
            // requête
            $request = "SELECT * FROM utilisateurs WHERE login ='$ssLogin'";
            
            $query = mysqli_query($bdd, $request);
            
            $recup = mysqli_fetch_assoc($query);
            
        }
        if (isset($_POST['submit'])) {
            //Je definis les variables
            $login = htmlspecialchars($_POST['login']);
            $password = sha1($_POST['password']);
            $newpassword = sha1($_POST['newpassword']);

            
            if ($password && $newpassword) {
                
                if ($password == $newpassword) {
                    
                    $newpass = mysqli_query($bdd, "UPDATE `utilisateurs` SET `password`= '$password'  WHERE `login` = '$ssLogin'");
                    if ($newpass) {
                        echo "Le mot de passe à été changé";
                    }
                }
            } 

            if (empty($login)) {
                echo "login incorrect";
            } else {
                
                $newlogin = mysqli_query($bdd, "UPDATE utilisateurs SET login ='$login' WHERE `login` = '$ssLogin'");
            }
        }
        ?>
        <h1> BIENVENUE</h1>
        <div class="div">
            <form action="" method="post">
                <table class= tab_profil>
                    <tr>
                    <td><label for="login">login:</label></td>
                    <td><input type="login" id="login" name="login"></td>
                    </tr>
                    <tr>
                    <td><label for="password">nouveau mot de passe:</label></td>
                    <td><input type="password" id="password" name="password"></td>
                    </tr>
                    <tr>
                    <td><label for="repeatnewpasword">confirmez votre nouveau mot de passe:</label></td>
                    <td><input type="password" id="newpassword" name="newpassword"></td>
                    </tr>
                <tr>
                 <td></td>  <td> <input type="submit" name="submit" value="valider!"></td>
                </tr>
                </table>
            </form>
        </div>
    </main>
</body>
<style>
    h1{
        margin-left:43%;
        font-size:120%;
    }

    .div{
        background-color: rgba(200,0,0,0.6);
        padding: 2% 2% 2% 2%;
        width: 30%;
        border-radius:30%;
        box-shadow:5px 5px 5px black;
        margin-left: 30%;
    }
</style>
</html>