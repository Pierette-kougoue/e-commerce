<?php 
   class panier{
       private $pdo;
       public function __construct($pdo){
           if(!isset($_SESSION)){
               session_start();
           }
           if(!isset($_SESSION['panier'])){
               $_SESSION['panier'] = [];
           }
           $this->pdo = $pdo;
           if(isset($_GET['delpanier'])){
               $this->del($_GET['delpanier']);
           }
       }

       public function count(){
          return array_sum($_SESSION['panier']);
       }
       public function total(){
            $total = 0;
            $ids = array_keys($_SESSION['panier']);
            $chaine = implode(',',$ids);
            if(empty($ids)){
                $articles = [];
            }else{
                $req = $this->pdo->query("SELECT * FROM article WHERE id IN ($chaine)");
                $articles = $req->fetchAll(PDO::FETCH_OBJ);
            }
            foreach($articles as $article){
                $total += $article->prix * $_SESSION['panier'][$article->id];
            }
            return $total;
       }

       public function add($article_id){
           if(isset($_SESSION['panier'][$article_id])){
            $_SESSION['panier'][$article_id]++;
           }else{
            $_SESSION['panier'][$article_id] = 1;
           }
          
       }
       public function del($article_id){
           unset($_SESSION['panier'][$article_id]);
       }
       public function dim($article_id){
           $_SESSION['panier'][$article_id]--;
       }
   }
?>