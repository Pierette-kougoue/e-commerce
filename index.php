<?php 
    include_once 'include/bd.php';
    include 'include/header.php';
    $req = $pdo->query('SELECT * FROM cathegorie');
    $cathegories = $req->fetchAll(PDO::FETCH_OBJ);
?>
<!--<div onload="slider">
   <img id="image">
   <script type="text/javascript">
      var i = 0;
      function change_image(){
          document.getElementById("image").src = "image/img"+(i++ % 6)+".PNG";
      }
      function slider(){
          setInterval(change_image, 1000);
      }
   </script>
</div>-->
<main class="main">
    <div class="article-main">
        <?php foreach($cathegories as $cathegorie): ?> 
            <div class="cath-article">
                <p class="titre"><?= $cathegorie->libelle ?></p>
                <img src="<?= $cathegorie->img ?>" alt="">
                <form action="article.php" method="post">
                    <input type="submit" value="Parcourire">
                    <input type="hidden" name="id_cath" value="<?= $cathegorie->id ?>">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="new">
        <div class="new-article">
          
        </div>
    </div>
</main>

<?php include 'include/footer.php' ?>