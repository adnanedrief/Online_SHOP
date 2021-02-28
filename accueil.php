<?php 
session_start(); // recupérer la session accuteil pour quand puisse récupérer le login
if( $_SESSION['login'] ==""){
    // pour ne passer a cette page si on passe pas de la page de login
        header('Location:auth.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mon magasin de Smartphones</title>
</head>
<body bgcolor="#FFFFFF">
    <br><br>
    <p align="right"><a href="logout2.php" class="btn btn-danger"> Déconnexion</a></p>
    <p>
        <center>
                <b class="display-4">Bienvenu, <font size="3" color="blue"class="display-4" > <?php echo $_SESSION['login'] ; ?> </font> , chez SMI E-CO!</b>
        </center>
</p>
    <p align="center" class="display-4">Votre panier est vide !?</p>
    <p align="center">
        <a href="initialisation.php" class="btn btn-success" style="font-size:25px;margin-top:-15px;">Cliquer ici </a><span class="display-4"> pour le remplir </span>
    </p>
</body>
</html>