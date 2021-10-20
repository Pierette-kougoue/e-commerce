<?php 
  require 'include/bd.php';
  require 'include/panier.php';
  require 'include/fonction.php';
  logged_only();
  $panier = new panier($pdo);
  var_dump($_SESSION['panier']);
?>
<div>
  <div class="">
    <form action="" method="post">
      
      <input type="text" name="tel" id="">
    </form>
  </div>
</div>