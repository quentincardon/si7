<?php

function actionAccueil($twig){
echo $twig->render('base.html.twig', array());}

function actionMaintenance($twig){
echo $twig->render('maintenance.html.twig', array());}

function actionDeconnexion($twig){
 session_unset();
 session_destroy();
 header("Location:index.php");}
 
function actionInscription($twig,$db){
$form = array();
 
 if (isset($_POST['btInscrire'])){
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $pseudo =$_POST['pseudo'];
 $email = $_POST['email'];
 $pass =$_POST['pass']; 
 $pass2 =$_POST['pass2'];
 $form['valide'] = true;
 $idrole= 1;
 $photo=NULL;
 

 if(isset($_FILES['photo'])){
 if(!empty($_FILES['photo']['name'])){
 $extensions_ok = array('png', 'gif', 'jpg', 'jpeg');
 $taille_max = 500000;
 $dest_dossier = '/home/vsftpd/legendarium_17nb/legendarium_17nb/web/images/profiles';
 if( !in_array( substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok ) ){
 echo 'Veuillez sélectionner un fichier de type png, gif ou jpg !';
 }
 else{
 if( file_exists($_FILES['photo']['tmp_name'])&& (filesize($_FILES['photo']
['tmp_name'])) > $taille_max){
 echo 'Votre fichier doit faire moins de 500Ko !';
 }
 else{
     $photo = basename($_FILES['photo']['name']);
 // enlever les accents

$photo=strtr($photo,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAA
AAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
 // remplacer les caractères autres que lettres, chiffres et point par _
 $photo = preg_replace('/([^.a-z0-9]+)/i', '_', $photo);
 // copie du fichier
 move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier.$photo);
 }
 }
 }
 }
 




 
 if ($pass!=$pass2){
 $form['valide'] = false;
 $form['message'] = 'Les mots de passe sont différents';
 
 }
 
 if (strlen($pass)<8) {
     $form['valide']=false;
    
$form['message'] = 'Votre mot de passe est trop court il doit contenir au moin 8 caractères';
       
}
else {
    
      $_SESSION['login']= $pseudo;
      
       $utilisateur = new Utilisateur($db);
 $exec = $utilisateur->insert($nom,$prenom,$pseudo,$email, password_hash($pass,
PASSWORD_DEFAULT), $idrole , $photo);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Veuillez vérifier les informations saisie ';
 }
 
}
 $form['email'] = $email;
 }
 echo $twig->render('inscription.html.twig', array('form'=>$form,'session'=>$_SESSION));
}

function actionInformation($twig){
     echo $twig->render('information.html.twig', array());}
     
function actionConnexion($twig, $db){
 $form = array(); //tableau 
 $form['valide'] = true; // forme valide dès le début
 if (isset($_POST['btConnecter'])){ // si le bouton est cliqué il vérifie les elements ci dessous et les enregistres dans les variables
 $pseudo = $_POST['pseudo'];
 $pass = $_POST['pass'];
 $utilisateur = new Utilisateur($db);
 $unUtilisateur = $utilisateur->connect($pseudo , $pass , $idrole); //effectue la requête de connexion dans modele_utilisateurs
 
 
 if ($unUtilisateur!=null){ // si utilisateurs
     
 if(!password_verify($pass,$unUtilisateur['pass'])){ // Si le mdp correspond
 $form['valide'] = false;
 $form['message'] = 'Login ou mot de passe incorrect';
 }
 else{
 $_SESSION['login'] = $pseudo;
 $_SESSION['role'] = $unUtilisateur['idrole'];
 header("Location:index.php");
 }
 }
 else{
 $form['valide'] = false;
 $form['message'] = 'Mot de passe ou Login incorrect';

 }
 }
 echo $twig->render('connexion.html.twig', array('form'=>$form));
}
     
function actionContact($twig){
echo $twig->render('contact.html.twig', array());}

function actionCompte($twig){
echo $twig->render('compte.html.twig', array());}

function actionIntroduction($twig){
echo $twig->render('introduction.html.twig', array());}

function actionReglement($twig){
echo $twig->render('reglement.html.twig', array());}

function actionInscriptionjdr($twig){
echo $twig->render('inscriptionjdr.html.twig', array());}

function actionPanel($twig){
echo $twig->render('panel.html.twig', array());}

?>