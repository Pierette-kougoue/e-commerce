<?php 
require 'include/header.php';
require 'include/bd.php';
if(!empty($_POST)){
  $id_cath = $_POST['id_cath'];
  $req = $pdo->query("SELECT * FROM article WHERE id_cath = $id_cath");
  $articles = $req->fetchAll(PDO::FETCH_OBJ);
}
?>
<main class="main">
  <div class="main-article">
    <?php foreach($articles as $article): ?>
    <div class="article">
        <img class="img img-vi" src="<?= $article->img_article ?>" alt="">
        <div class="detail">
          <?= $article->description?>
        </div>
        <hr>
      <span class="description">
        <p class="marque"><?= $article->Marque ?> : </p> <p class="prix"><?= number_format($article->prix,2,',',' ')?> FCFA</p>
      </span>
      <hr>
      <div class="option">
        <a href="addarticle.php?id=<?= $article->id?>" class="ajouter addpanier">+</a>
        <a href="" class="btn-detail">Detail</a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</main>
<?php require 'include/footer.php' ?>