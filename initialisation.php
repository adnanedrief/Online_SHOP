<?php 
    session_start();
    if( $_SESSION['login'] ==""){
        // pour ne passer a cette page si on passe pas de la page de login
    
            header('Location:auth.php');
    }
    $_SESSION['panier'] = array("SAMSUNG_GALAXY_S9"=>0,"HUAWEI_P30"=>0,"Apple_iPhone_8"=>0);
    header("Location:ajout_article.php");
    /* 
        si vous souhaitez que votre scipt fonctionne meme si le visteur refuse les cookies il faut ajouter à l'URL 
        la chaine de caractères tockeés dans la constante SID: header("Location:ajout_article.php".SID);
    
    */ 
?>