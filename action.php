<?php 
session_start();
require_once 'include/bd.php'; 
try{
  if(!empty($_POST)){
      $req=$pdo->prepare("SELECT * from client where (email=:email)");
    $req->execute(['email'=>$_POST['email']]);
    $donne = $req->fetch(PDO::FETCH_OBJ);
    if(password_verify($_POST['password'],$donne->pwd)){
      $_SESSION['client'] = $donne;
      $_SESSION['success'] = 'Vous ètes maintenant connecté';
      header('Location: MonPanier.php');
      exit();
    }else{
      $_SESSION['danger'] = 'Email ou mot de passe invalide';
      header('Location: index.php');
    }
  }
  
 }catch(PDOException $e){
    die('error:' .$e->getMessage());
 }
?>