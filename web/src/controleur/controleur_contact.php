 <?php
function actionContact($twig, $db){
 $form = array();
 $contact = new contact($db);
 $liste = $contact->select();
 if (isset($_POST['btGererC'])){
      
      $nom = $_POST['nom'];
      $pseudo = $_POST['pseudo'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      
      $form['valide'] = true;
      
      $contact->insert($nom, $pseudo, $email, $message);
      $contact = new contact ($db);
      $liste = $contact->select();

  }
  echo $twig->render('contact.html.twig', array('form'=>$form,'liste'=>$liste));
}



function actionGestionContact($twig, $db){
 $form = array();
 $contact = new contact($db);
 $liste = $contact->select();
 echo $twig->render('gestionContact.html.twig', array('form'=>$form,'liste'=>$liste));
 
}
?>