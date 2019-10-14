<?php

function actionContact($twig,$db){
 $form = array();
 $contact = new contact($db);
 $liste = $contact->select();
 $form['valide'] = true;
 
 if(isset($_GET['id'])){
 $exec=$contact->delete($_GET['id']);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Il y a eu un problème veuillez vérifier le contenue n\' oublié pas que le contenue de résumé est limité a 255 caractère.';
 }
 else{
 $form['valide'] = true;
 $form['message'] = 'L\'actualité a était posté avec succès !';
 }
 }

echo $twig->render('contact.html.twig', array('liste'=>$liste));
}

