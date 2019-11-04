<?php
class Catalogue{
  private $db;
  private $insert;
  private $select;
  private $selectByGenre; 
 

  public function __construct($db){
        $this->db = $db;      
        $this->insert = $db->prepare("insert into catalogue(titre, resume, auteur, couverture , gerne) values(:titre, :resume, :auteur, :couverture , :gerne)");    
        $this->select = $db->prepare("select * from catalogue c, gerne g ");
        $this->selectByGenre = $db->prepare("select * from catalogue c, gerne g where gerne=:gerne ");
        
}

  public function insert($titre,$resume,$auteur,$couverture,$gerne){
        $r = true;
        $this->insert->execute(array(':titre'=>$titre, ':resume'=>$resume, ':auteur'=>$auteur, ':couverture'=>$couverture, ':gerne'=>$gerne));
             if ($this->insert->errorCode()!=0){
                 print_r($this->insert->errorInfo());  
                 $r=false;
             }
     return $r;
}



public function select(){
        $liste = $this->select->execute();
        if ($this->select->errorCode()!=0){
        print_r($this->select->errorInfo());
}
    return $this->select->fetchAll();
}
 
public function selectByGenre(){
        $liste = $this->selectByGenre->execute();
        if ($this->selectByGenre->errorCode()!=0){
        print_r($this->selectByGenre->errorInfo());
}
    return $this->selectByGenre->fetchAll();
}
}

?>