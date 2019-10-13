 <?php
function actionGQuestion($twig, $db){
 $form = array();
 $question = new question($db);
 $liste = $question->select();
 if (isset($_POST['btGererF'])){

      $pseudo = $_POST['pseudo'];
      $objet = $_POST['objet'];
      $message = $_POST['message'];
      
      $form['valide'] = true;
      
      $question->insert($pseudo, $objet, $message);
      $question = new question ($db);
      $liste = $question->select();

  }
  echo $twig->render('question.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>