<?php

class contact {

      private $db;
  private $insert;
  private $select;



  public function __construct($db){
        $this->db = $db;      
        $this->insert = $db->prepare("insert into contact(nom, pseudo, email, message) values(:nom, :pseudo, :email, :message)");    
          $this->select = $db->prepare("select * from contact");
        
}

  public function insert($nom,$pseudo,$email,$message){
        $r = true;
        $this->insert->execute(array(':nom'=>$nom, ':pseudo'=>$pseudo, ':email'=>$email, ':message'=>$message));
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
}
 ?>