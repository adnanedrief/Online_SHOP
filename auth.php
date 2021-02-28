<?php 


require_once 'connexion.php';
if($_POST){ // verifie d'abord si le tableau associatif n'est pas vide
    $login = $_POST['login'];
    $mdp = $_POST['password'];

    if($login!="" && $mdp!=""){
        $sql="SELECT username,passwrd FROM users where username='$login' and passwrd = '$mdp'";
        $resultat = mysqli_query($bdd,$sql); // le resultat est sous forme d'une seul ligne
        if($resultat==true){ 
                $ligne=mysqli_fetch_assoc($resultat);// création du tableau assosiatif
                if($ligne!=""){// pour vérifié s'il y'a un résultat dans la ligne extraite
                        extract($ligne);
                        if($username == $login && $passwrd==$mdp){
                            // on ouvre la session 
                            session_start();
                            //On enregistre le Login en session
                            $_SESSION['login'] = $username;
                            // redirection vers le fichier accueil.php
                            header('Location:accueil.php');
                        }
                    
                }
                else{
                         $errorMessage = "Veuillez verfier votre login ou mot de passe ! ";
                        
                }
               
            }
            
    }else{//resultat == false
        $errorMessage = "Veuillez saisir votre login ou mot de passe ! ";

    }
        
}
    
    mysqli_close($bdd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>formulaire d'authentification</title>
</head>
<body>
    <br><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <center>
        <table class="table table-bordered" style="width:30%;margin:0 auto;">
        <tr>
            <td>
                <fieldset>
                        <legend><center>Identifiez-vous</center></legend>
                        <?php 
                            // recontre-t-on une erreur ?
                            if(!empty($errorMessage)){
                                echo '<p><center><font size="4" color="red">' , htmlspecialchars($errorMessage) , '</font></center></p>';
                            }
                        ?>
                        <table class="table table-hover" style="width:90%;margin:0 auto;">
                            <tr>
                                <td>
                                        <label for="login" >Login : </label>
                                </td>
                                <td>
                                        <input type="text" name="login" id="login" value=""  class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                        <label for="password">Password : </label>
                                </td>
                                <td>
                                        <input type="password" name="password" id="password" value="" class="form-control">
                                </td>
                            </tr>
                            <tr >
                                <td colspan="2" style="text-align: center; vertical-align: middle; "> 
                                        <input type="submit" name="submit" value="Se connecter" class="btn btn-primary">
                                        <a href="inscription.php" class="btn btn-success">S'inscrire</a>
                                </td>
                            </tr>
                        </table>
                </fieldset>
            </td>
        </tr>
        </table>
    </center>
    </form>
</body>
</html>
