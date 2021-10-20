<?php 
  function logged_only(){
    // securise les comptes de l'utilisateure contre des accées non valide 
    if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    if(!isset($_SESSION['client'])){
      $_SESSION['danger'] = "Vous n'avez pas le droit d'accéder à cette page veille vous connecter a votre compte";
      header('Location: inscription.php');
    exit();
    }
  }
?>