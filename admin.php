<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    
    <title>Admin</title>
</head>
<header>
    <?php
    include("header.php");
    ?>
</header>
<main>
    <?php
 

        $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion') or die('erreur');
        $requete = "SELECT * FROM utilisateurs";
        $query = mysqli_query($bdd, $requete);
        $recup = mysqli_fetch_all($query);
       
    
    ?>
    <table>
        <thead>
            <tr>
                <th>login</th>
                <th>nom</th>
                <th>prenom</th>
                <th>mot de passe</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recup as $utilisateur) {  ?>
            <tr>
              <td><?php echo$utilisateur[1] ?></td>  
              <td><?php echo$utilisateur[2]  ?></td>
              <td><?php echo$utilisateur[3] ?></td>
              <td><?php echo$utilisateur[4] ?></td>
                
            </tr>
       <?php } ?>
        </tbody>
    </table>


</main>

<body>
<style>
    table{
        
        border-collapse:collapse;
    }
    thead{
        border: 2px black solid;
    }
    td{
        border: 2px black solid;
        padding: 2%;
        width:2%;
    }
   
</style>
</body>

</html>