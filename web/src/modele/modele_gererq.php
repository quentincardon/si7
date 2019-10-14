<?php
class gererq{
 private $db;
 private $insert;
 private $select;


public function __construct($db){
  $this->db = $db ;
  $this->insert = $db->prepare("insert into forum (pseudo, objet, message) values (:pseudo, :objet, :message)");
  $this->select = $db->prepare("select * from forum");

 }

 public function insert($pseudo, $objet, $message){
 $r = true;
 $this->insert->execute(array(':pseudo' => $pseudo, ':objet' => $objet, ':message' => $message ));
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