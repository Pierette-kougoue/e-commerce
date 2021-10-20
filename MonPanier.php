<?php 
  require 'include/header.php';
  require 'include/bd.php';
  require 'include/fonction.php';
  logged_only();
  if(isset($_GET['del'])){
    $panier->del($_GET['del']);
  }
  $ids = array_keys($_SESSION['panier']);
  $chaine = implode(',',$ids);
  if(empty($ids)){
    $articles = [];
  }else{
    $req = $pdo->query("SELECT * FROM article WHERE id IN ($chaine)");
    $articles = $req->fetchAll(PDO::FETCH_OBJ);
  }
?>
<div class="panier">
    <div class="table">
        <div class="col col-tete">
            <div class="cel">Article</div>
            <div class="cel">Prix</div>
            <div class="cel">Quantité</div>
            <div class="cel">Action</div>
        </div>
        <?php foreach($articles as $article): ?>
        <div class="col">
            <div class="cel cel-article"><img src="<?= $article->img_article?>" alt=""height="50px" width="50px"><p><?= $article->Marque?></p></div>
            <div class="cel"><?= number_format($article->prix,2,',',' ')?> FCFA</div>
            <div class="cel"><?= $_SESSION['panier'][$article->id]; ?></div>
            <div class="cel cel-action">
                <!--<a href="diminuerArticle.php?id=<?= $article->id?>" class="diminuer"><img src="icone/cart-dash.svg" alt=""></a>-->
                <a href="MonPanier.php?delpanier=<?= $article->id?>" class="del" onclick="return  confirm_delete();">Supprimer</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="total">
        Prix Totale : <span class="prix-total"><span><?= number_format($panier->total(),2,',',' ') ;?> FCFA</span>
    </div>
    <div class="confirmer">
        <a href="confirmer.php" class="conf">Confirmé l'achat</a>
    </div>
    
</div>
<?php require 'include/footer.php' ?>