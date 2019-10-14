 <?php
function actionGererqa($twig, $db){
 $form = array();
 $gererq = new Gererq($db);
 $liste = $gererq->select();
 if (isset($_POST['btGererQ'])){

      $pseudo = $_POST['pseudo'];
      $objet = $_POST['objet'];
      $message = $_POST['message'];
      
      $form['valide'] = true;
      
      $gererq->insert($pseudo, $objet, $message);
      $gererq = new Gererq ($db);
      $liste = $gererq->select();

  }
  echo $twig->render('gererq.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>