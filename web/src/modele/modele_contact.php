<?php

class modele_contact {

      private $db;
  private $insert;

 

  public function __construct($db){
        $this->db = $db;      
        $this->insert = $db->prepare("insert into contact(nom, pseudo, email, message) values(:nom, :pseudo, :email, :message)");    
        
        
}

  public function insert($nom,$pseudo,$pseudo,$email){
        $r = true;
        $this->insert->execute(array(':nom'=>$nom, ':pseudo'=>$pseudo, ':email'=>$email, ':message'=>$message));
             if ($this->insert->errorCode()!=0){
                 print_r($this->insert->errorInfo());  
                 $r=false;
             }
     return $r;
}
    
}
