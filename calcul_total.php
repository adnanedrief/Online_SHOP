<?php
    require_once 'connexion.php';
    session_start(); // on récupère la session actuel
    if( $_SESSION['login'] ==""){
    // pour ne passer a cette page si on passe pas de la page de login
        header('Location:auth.php');
    }
    $client = $_SESSION['login'] ;
    $panier = $_SESSION["panier"];
    $total = 0;
    $total +=$panier["SAMSUNG_GALAXY_S9"]*7000;
    $total +=$panier["HUAWEI_P30"]*8000;
    $total +=$panier["Apple_iPhone_8"]*6500;

    $produits = ""; // pour la concaténation
    $NCommande=""; // pour éviter l'erreru d'affichage avant la confirmation de la commande
    if(isset($_POST['confirmation'])){
                $sql = "INSERT INTO commandes(Client,Total) VALUES ('$client','$total')";
                $resultat1 = mysqli_query($bdd,$sql); // éxécution de la requete

                foreach($panier as $cle => $val){
                    if($val!=0){
                        $produits .= "||" . $cle ;
                        
                    }
                }
                //print $produits;
                $sql = "UPDATE commandes SET Produits = '$produits'  WHERE Client = '$client';";
                $resultat2 = mysqli_query($bdd,$sql); // éxécution de la requete
                if($resultat1 == true & $resultat2  == true){
                    //vérifié l'insertion des données dans la BD est bien effectué
                    echo "<script>alert(\"Votre commande est bien confirmer vous pouvez maintenant imprimer votre facture en cliquant sur le button [ imprimer facture ] en dessus!!\");</script>";
                }
                else{
                    echo "<script>alert(\"Erreur de confirmation de votre Commande !!\");</script>";

                }
                // extraction de N°commande
                $sql = "SELECT NCommande FROM commandes WHERE Client = '$client';";
                $resultat = mysqli_query($bdd,$sql); // éxécution de la requete 
                $ligne = mysqli_fetch_assoc($resultat);
                extract($ligne);
                //echo $NCommande;      
    }
    mysqli_close($bdd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mon magasin de smartphones</title>
</head>
<body >
<form action="calcul_total.php" method="post">
   <br>
        <center><b class="display-3">Chez SMI E-CO!&nbsp;</b></center>
    <br><br>    
    <table class="table table-hover table-bordered" style="width:40%;margin:0 auto;" >
            <tr>
                    <td colspan="3" style="text-align: left; vertical-align: middle; ">    
                        <h5 >
                            Client : <font size="4" color="blue"> <?php echo $_SESSION['login'] ; ?> </font>
                            <span style="margin-left:38%;" > 
                                 
                                     <?php if($NCommande!="") echo "N°commande :  <font size='4' color='red'> " .$NCommande  ."</font>"; ?> 
                                
                            </span>
                        </h5>
                    </td>
            </tr>
            <tr align="center" class="table-warning">
                <td style="text-align: center; vertical-align: middle; ">Produits</td>
                <td style="text-align: center; vertical-align: middle; ">Quantités commander</td>
             </tr>
            <?php 

            foreach($panier as $cle => $val){
                if($val!=0){
                    echo "<tr>";
                    echo "<td style='text-align: center; vertical-align: middle;' >$cle </td>";
                    echo "<td style='text-align: center; vertical-align: middle;' > $val  </td></tr>";
                    
                    
                }
            }
            echo "<tr><td colspan='4' style='text-align: right;'> <font size='5' color='red' >Total : $total DH </font></tr>";
            ?>
            
    </table><br>
            <p align="center">
                <a href="ajout_article.php" class="btn btn-primary"> Modifier mon panier</a>
                <a href="initialisation.php" class="btn btn-danger"> Vider mon panier</a>
                <input type="submit" name="confirmation" value ="Confirmer la commande" class="btn btn-warning">
                <a href="#" onclick="window.print()" class="btn btn-success">Imprimer la facture</a>
                
            </p>
    </form>        
</body>
</html>
