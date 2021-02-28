<?php 
    
    session_start(); // on récupère la session actuel
    if( $_SESSION['login'] ==""){
    // pour ne passer a cette page si on passe pas de la page de login

        header('Location:auth.php');
    }

    $panier=$_SESSION['panier'];
    if(isset($_GET["ajout"])){
        switch($_GET["ajout"]){
                case "SAMSUNG_GALAXY_S9":$panier["SAMSUNG_GALAXY_S9"]++;break;
                case "HUAWEI_P30":$panier["HUAWEI_P30"]++;break;
                case "Apple_iPhone_8":$panier["Apple_iPhone_8"]++;break;
        }
    }
    $_SESSION['panier'] = array("SAMSUNG_GALAXY_S9"=>$panier["SAMSUNG_GALAXY_S9"],
    "HUAWEI_P30"=>$panier["HUAWEI_P30"],
    "Apple_iPhone_8"=>$panier["Apple_iPhone_8"]);
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
    <p align ="right">
        <b >Bienvenu, <font size="4" color="blue" > <?php echo $_SESSION['login'] ; ?> </font> , chez SMI E-CO!&nbsp;</b>
        <a href="logout2.php" class="btn btn-danger">Déconnexion</a>    
    </p>
    <table class="table table-hover table-bordered" style="width:70%;margin:0 auto;" >
        <tr align="center" class="table-warning">
            <td style="text-align: center; vertical-align: middle; ">Produits</td>
            <td style="text-align: center; vertical-align: middle; ">Image du produit</td>
            <td style="text-align: center; vertical-align: middle; ">Prix</td>
            <td style="text-align: center; vertical-align: middle; ">Quantités commander</td>
        </tr>
        <tr >
            <td style="text-align: center; vertical-align: middle; "> SAMSUNG GALAXY S9 NOIR</td>
            <td><img src="https://networkservice.ma/7993-medium_default/-samsung-galaxy-s9-noir-58-dual-sim-64-gb-.jpg" height="50%"></td>
            <td style="text-align: center; vertical-align: middle; ">
                 Prix : 7000DH<br>
                <a href="ajout_article.php?ajout=SAMSUNG_GALAXY_S9" class="btn btn-success"> Ajouter au panier</a> 
            </td>
            <td style="text-align: center; vertical-align: middle; ">
              <font size="3" color="red"><b><?php echo $panier["SAMSUNG_GALAXY_S9"]?></b></font><br> SAMSUNG GALAXY S9
            </td>
        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle; ">  HUAWEI P30</td>
            <td><img src="https://img.bgxcdn.com/thumb/large/oaupload/banggood/images/48/E6/41cf1a24-6532-4ff6-8775-cde6066cfef3.jpg" height="25%"></td>
            <td style="text-align: center; vertical-align: middle; ">
                Prix : 8000DH<br>
                <a href="ajout_article.php?ajout=HUAWEI_P30" class="btn btn-success"> Ajouter au panier</a>
            </td>
            <td style="text-align: center; vertical-align: middle; ">
                <font size="3" color="red"><b><?php echo $panier["HUAWEI_P30"]?></b></font> <br>HUAWEI P30
            </td>
        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle; ">  Apple iPhone 8</td>
            <td><img src="https://static.fnac-static.com/multimedia/Images/FR/MDM/ab/a2/38/3711659/1540-1/tsp20200331110734/Apple-iPhone-8-Plus-64-Go-5-5-Rouge.jpg" height="70%"></td>
            <td style="text-align: center; vertical-align: middle; ">
                 Prix : 6500DH<br>
                <a href="ajout_article.php?ajout=Apple_iPhone_8" class="btn btn-success"> Ajouter au panier</a>
            </td>
            <td style="text-align: center; vertical-align: middle; ">
                <font size="3" color="red"><b><?php echo $panier["Apple_iPhone_8"]?></b></font><br> Apple iPhone 8
            </td>
        </tr>
    </table>
    <p>
        <center>
            <h5>
                <a href="initialisation.php" class="btn btn-danger" >Vider mon panier   </a>    
                <a href="calcul_total.php"  class="btn btn-success">calculer le total</a><br>
                <!---->
                <a href="accueil.php" align="left"  class="btn btn-primary" style="margin:5px;">Retour à la page d'accueil</a>
            </h5>
         </center>
    </p>
</body>
</html>