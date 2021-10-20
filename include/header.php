<?php 
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    require 'bd.php';
    require 'panier.php';
    $panier = new panier($pdo);
    $req = $pdo->query('SELECT * FROM cathegorie');
    $ids = $req->fetchALL(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topbar">
        <nav class="topbar-primaire">
            <div>
            <a href="index.php" class="logo"> <img src="icone/mon logo.png" width="70px" alt=""></a>
            </div>
           <div class="nav">
               <a href="./MonPanier.php"  id="panier"><img src="icone/cart4.svg" width="30px" alt=""><span class="count"><?= $panier->count()?></span></a>
               <?php if(!empty($_SESSION['client'])): ?>
               <a href="../deconnexion.php" onclick="return  confirm_deconnexion();">Déconnexion</a>
               <a><?=strtoupper($_SESSION['client']->username)?></a>
               <?php else: ?>
               <a href="#connexion" class="js-modal">Connexion</a>
               <?php endif ?>
           </div>
        </nav>
        <nav class="topbar-second">
            <div class="menu">
                <a href="index.php">Acceuil</a>
                <a href="#" class="cathgorie">Cathegorie</a>
                <a href="apropo.php">A propos</a>
            </div>
        </nav>
        <div class="dynamic-nav2">
                <?php foreach($ids as $id): ?>
                    <form action="article.php" method="post">
                        <input type="submit" class="cath" value="<?= $id->libelle ?>">
                        <input type="hidden" name="id_cath" value="<?= $id->id ?>">
                    </form>
                <?php endforeach ?>
            </div>
        <?php if(isset($_SESSION['danger'])): ?>
            <div class="alert">
            <?=$_SESSION['danger']; ?>
            </div>
            <?php unset($_SESSION['danger']); ?>
        <?php elseif(isset($_SESSION['success'])): ?>
        <div class="success">
            <?= $_SESSION['success']; ?>
            </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif;?>
    
    </header>