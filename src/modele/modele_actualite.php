<?php
class actualite{
  private $db;
  private $insert;
  private $select;
  private $delete;

  public function __construct($db){
        $this->db = $db;      
        $this->insert = $db->prepare("insert into actualite(titre, message, date) values(:titre, :message , :date)");    
        $this->select = $db->prepare("select titre, message, idactu, date from actualite a ORDER BY idactu DESC");
        $this->delete = $db->prepare("delete from actualite  where idactu=:idactu");

}

  public function insert($titre,$message,$date){
        $r = true;
        $this->insert->execute(array(':titre'=>$titre, ':message'=>$message , ':date'=>$date ));
             if ($this->insert->errorCode()!=0){
                 print_r($this->insert->errorInfo());  
                 $r=false;
             }
     return $r;
}
public function delete($idactu){
 $r = true;
 $this->delete->execute(array(':idactu'=>$idactu));
 if ($this->delete->errorCode()!=0){
 print_r($this->delete->errorInfo());
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
 
}

?>