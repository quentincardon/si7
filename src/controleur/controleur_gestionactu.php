<?php

function actionActualite($twig,$db){
 $form = array();
 $actualite = new actualite($db);
 $liste = $actualite->select();
 $form['valide'] = true;
 
 if(isset($_GET['idactu'])){
 $exec=$actualite->delete($_GET['idactu']);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Il y a eu un problème veuillez vérifier le contenue n\' oublié pas que le contenue de résumé est limité a 255 caractère.';
 }
 else{
 $form['valide'] = true;
 $form['message'] = 'L\'actualité a était posté avec succès !';
 }
 }

echo $twig->render('actualite.html.twig', array('liste'=>$liste));
}

function actionGestionactu($twig,$db){
$form = array();

 if (isset($_POST['btAjouter'])){

 $titre = $_POST['titre'];
 $message= $_POST['message'];
 $date = date('y.m.d');
 $date = implode('-', array_reverse(explode('/', $date)));

 if ($exec){
 $form['valide'] = false;
 $form['message'] = 'Il y a eu un problème veuillez vérifier le contenue n\' oublié pas que le contenue de résumé est limité a 255 caractère.';
 }
 else{
 $form['valide'] = true;
 $form['message'] = 'L\'actualité a était posté avec succès !';
 }
 
 
 $actualite = new actualite($db);
 $exec = $actualite->insert($titre,$message,$date);
 

 
 $form['titre'] = $titre;
 }
 echo $twig->render('gestionactualite.html.twig', array('form'=>$form,));
}



?>