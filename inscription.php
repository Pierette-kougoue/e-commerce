<?php 
session_start();
require 'include/header.php';
require 'include/bd.php';
try{
    if(!empty($_POST)){
        $req = $pdo->prepare("INSERT INTO client(username,email,pwd,adress) VALUES (?,?,?,?)");
        $pwd=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $req->execute([$_POST['username'],$_POST['email'],$pwd,$_POST['adresse']]);
        $_SESSION['error'] = 0;
        $_SESSION['success'] = 'Compte crée avec Succes';
    }
}catch(PDOException $e){
    die('Erreur :' .$e->getMessage());
}
?>
<main class="inscription">
    <form action="#" method="post" class="form">
        <div>
            <input type="text" id="name" name="username" placeholder="Nom et prenom">
            <span class="error">Entrez un pseudo</span>
            <input type="text" id="adress" name="adresse" placeholder="Adresse">
            <span class="error">Entrez votre adresse</span>
            <input type="email" id="email" name="email" placeholder="Entrez votre email">
            <span class="error">Email invalide(exemple@gmai.com)</span>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
            <span class="error">Entrez un mot de passe valide au moins 6 caractére</span>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</main>
<?php include 'include/footer.php' ?>