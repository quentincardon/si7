<?php
function actionGestionMembres($twig, $db){
 $form = array();
 $utilisateur = new Utilisateur($db);
 $liste = $utilisateur->select();
 echo $twig->render('gestionmembres.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionModifUtilisateur($twig, $db){
 $form = array();
 if(isset($_GET['pseudo'])){
 $utilisateur = new Utilisateur($db);
 $unUtilisateur = $utilisateur->selectByEmail($_GET['pseudo']);
 if ($unUtilisateur!=null){
     $form['utilisateurs'] = $unUtilisateur;
 }
 else{
 $form['message'] = 'Utilisateur incorrect';
 }
 }
 else{
 $form['message'] = 'Utilisateur non précisé';
 }
 echo $twig->render('compte.html.twig', array('form'=>$form));
}
 

?>