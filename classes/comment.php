<?php

Class comment{
  
    private $id;
    private $membre_id;
    private $representation_id;
    private $contenu;

    public function getId(){
        return $this->id;
    }

    public function getMembreId(){
        return $this->membre_id;
    }

    public function getRepresentationId(){
    return $this->representation_id;
    }

    public function getContenu(){
    return $this->contenu;
    }

      public function setMembreId($membre_id){
      return $this->membre_id = $membre_id;
    }

    public function setRepresentationId($representation_id){
        return $this->representation_id = $representation_id;
    }

    public function setContent($contenu){
        return $this->contenu = $contenu;
    }


    public function insertComment($membre,$representation,$contenu){
        $co = new Db();
        $db = $co->dbCo("panza","root","root");

        $sql = "INSERT INTO `commentaire`( `membre_id`,`representation_id`, `contenu`) VALUES (?,?,?)";
        $param = [$membre,$representation,$contenu];
        $co->SQLWithParam($sql,$param,$db);

    }

    public function getComment($id){
    $co = new Db();
    $db = $co->dbCo("panza","root","root");

    /* Utilisation de la fonction SQLWithParam */
    $sql = "SELECT * FROM commentaire where id=?";
    $param = [$id];
    $datas = $co->SQLWithParam($sql,$param,$db);

    if(!empty($datas)){
        $comment = $datas[0];

        $this->id = $comment["id"];
        $this->membre_id = $comment["membre_id"];
        $this->representation_id = $comment["representation_id"];
        $this->contenu = $comment["contenu"];
    }
    }

    public function getAllComments()
    {
    
        $co = new Db();
        $db = $co->dbCo("panza","root","root");
        return $co->SQLWithoutParam("SELECT * FROM commentaire",$db);
    }

        public function getAllCommentsById($commentId)
    {
    
        $co = new Db();
        $db = $co->dbCo("panza","root","root");
        $param = [$commentId];
        return $co->SQLWithParam("SELECT CONCAT(`prenom`,' ' ,`nom`) utilisateur, `contenu` FROM `membre` m INNER JOIN `commentaire` c ON m.id=c.membre_id WHERE `representation_id`=?",$param,$db);
    }

    

}

?>