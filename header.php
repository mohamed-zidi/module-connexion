<?php

session_start();
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion.php');
}
?>




<?php
if (isset($_SESSION['login']) && $_SESSION['login']=='admin'){
echo "<nav> 
<div>
        <ul>
            <li><a href='index.php'> Accueil</a></li>
            <li><a href='profil.php'>Profil</a></li>
            <li><a href='admin.php'>Admin</a></li>
        </ul>

            </div>
            <form  action='profil.php' method='post'>
                <div class='form-example'>
                <input  type='submit' name='deconnexion' value='Déconnexion'></input>
                </div>
            </form>
            
        </nav>";
}elseif  (isset($_SESSION['login']) && $_SESSION['login'] !='admin') 
{
    echo "<nav>
    <div>
        <ul>
        <li>    <a href='index.php'> Accueil</a></li>
        <li>    <a href='profil.php'>Profil</a></li>
        </ul>    
            </div>
            <form  action='profil.php' method='post'>
                <div class='form-example'>
                <input  type='submit' name='deconnexion' value='Déconnexion'></input>
                </div>
            </form>
            
        </nav>";
}
else{
    echo "<nav>
    <ul>
    <li><a href='index.php'> Accueil</a> </li>
    <li><a href='inscription.php'>Inscription</a></li>
    <li><a href='connexion.php'>Connexion</a></li>
    </ul>
        </nav>";
}

?>

<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>