<?php
require 'include/bd.php';
require 'include/panier.php';
$panier = new panier($pdo);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $req = $pdo->query("SELECT id FROM article WHERE id = $id");
    $article = $req->fetchALL(PDO::FETCH_OBJ);
    $panier->add($article[0]->id);
}
?>
<?= $panier->count()?>
