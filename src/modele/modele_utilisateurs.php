<?php
class Utilisateur{
  private $db;
  private $insert;
  private $connect;
  private $select;
  
  public function __construct($db){
        $this->db = $db;      
        $this->insert = $db->prepare("insert into utilisateurs(nom, prenom, pseudo, email, pass ,idrole, photo) values(:nom, :prenom, :pseudo, :email, :pass , :idrole , :photo)"); // 
        $this->connect = $db->prepare("select pseudo, idrole, pass from utilisateurs where pseudo=:pseudo ");
        $this->select = $db->prepare("select pseudo, nom, prenom, email from utilisateurs u ");
        $this->selectByPseudo = $db->prepare("select pseudo, email, nom, prenom, idRole from utilisateurs u where
pseudo=:pseudo");
}

  public function insert($nom, $prenom, $pseudo, $email, $pass, $idrole,$photo){
        $r = true;
        $this->insert->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':pseudo'=>$pseudo, ':email'=>$email, ':pass'=>$pass, ':idrole'=>$idrole, ':photo'=>$photo));
             if ($this->insert->errorCode()!=0){
                 print_r($this->insert->errorInfo());  
                 $r=false;
             }
     return $r;
}

public function selectByEmail($pseudo){
 $this->selectByEmail->execute(array(':pseudo'=>$pseudo));
 if ($this->selectByEmail->errorCode()!=0){
 print_r($this->selectByEmail->errorInfo());
 }
 return $this->selectByEmail->fetch();
 }



public function connect($pseudo, $pass , $idrole){
        $unUtilisateur = $this->connect->execute(array(':pseudo'=>$pseudo ));
        if ($this->connect->errorCode()!=0){
        print_r($this->connect->errorInfo());
}
    return $this->connect->fetch();
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