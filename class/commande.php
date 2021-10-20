<?php  class Commande{
    public static $nbrCommend = 0;
    public $id_article;
    public $id_cmd;
    public $quantite;

    public function __construct($id_article,$id_cmd,$quantite)
    {
       $this->id_article = $id_article;
       $this->id_cmd = $id_article;
       $this->quantite = $quantite;
       $nbrCommend = $nbrCommend + 1;
    }
}
?>