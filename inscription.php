<?php 

    require_once 'connexion.php';
    session_start(); // récupréer la session actuel
    if(isset($_POST['submit'])){
        if($_POST["verif_code"] == $_SESSION['code']){
                // en vérifie d'abord si le captcha est valide !
                if($_POST['login'] != "" && $_POST['mdp'] != "" && $_POST['email'] != "" ){ 
                    extract($_POST); 
                    /******************************************* */
                    if($mdp != $mdpv ){
                        echo "<script>alert(\"Erreur d'inscription!! le mot de passe n'est pas identique\");document.location='inscription.php'</script>";
                        die();// Pour que le scirpt php  s'arrete ici 
                    }
                    if($email != $emailv){
                        echo "<script>alert(\"Erreur d'inscription!! L'email n'est pas identique\");document.location='inscription.php'</script>";
                        die();// Pour que le scirpt php  s'arrete ici 
                    }
                    /******************************************* */
                    $sql = "INSERT INTO users(username,passwrd,email) VALUES ('$login','$mdp','$email')";
                    $resultat = mysqli_query($bdd,$sql); // éxécution de la requete
                    if($resultat){ // $resultat == true
                        $_SESSION['login']=$_POST["login"];
                        echo "<script>alert(\"inscription réussi!!\");document.location='accueil.php'</script>";
                
                    }
                    mysqli_close($bdd);
                }
                else{// on a pas saisie le login , mdp , email 
                    echo "<script>alert(\"Erreur d'inscription!! Vérifiez les coordonnées saisies\");document.location='inscription.php'</script>";
                }
        }
        else{ // le code de captcha est non valide
            echo "<script>alert(\"Erreur d'inscription!! Veuillez vérifier le CAPTCHA  ou les coordonées saisies!!\");document.location='inscription.php'</script>";
            //header('Location:inscription.php');
        }
        
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    <br>
    <h2 class="display-4"><center>Connectez-vous et profitez de nos meilleur produits</center></h2>
    <form action="inscription.php" method="post">
            <table class="table table-hover table-bordered" style="width:45%;margin:0 auto;" >
                    <tr>
                        <td>Login</td>
                        <td><input type="text" name="login" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td><input type="password" name="mdp" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Retapez votre mot de passe</td>
                        <td><input type="password" name="mdpv" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="email" name="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Retapez votre E-mail</td>
                        <td><input type="email" name="emailv" class="form-control"></td>
                    </tr>
                    <!-- On affiche l'image généré par notre script-->
                    <tr>
                        <td colspan="2"><center><img src="captcha_generateur.php" alt="Code de verification"></center></td>
                    </tr>
                    <tr>
                        <td>Merci de retaper le code de l'image ci-dessus</td>
                        <td><input type="text" name="verif_code" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; vertical-align: middle; ">
                            <input type="submit" name="submit" value="S'inscrire" class="btn btn-success">
                             <a href="auth.php" class="btn btn-primary mb">Revevnir à la page de login</a>
                        </td>
                    </tr>
            </table>
    </form>
</body>
</html>