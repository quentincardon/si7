
<?php 

function actionGestioncatalogue($twig,$db){
$form = array();
 
 if (isset($_POST['btAjouter'])){
 $titre = $_POST['titre'];
 $resume= $_POST['resume'];
 $auteur = $_POST['auteur'];
 $gerne = $_POST['gerne'];
 $couverture=NULL;
 if(isset($_FILES['photo'])){
 if(!empty($_FILES['photo']['name'])){
 $extensions_ok = array('png', 'gif', 'jpg', 'jpeg');
 $taille_max = 500000;
 $dest_dossier = '/home/vsftpd/legendarium_17nb/legendarium_17nb/web/images/couverture/';
 if( !in_array( substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok ) ){
 echo 'Veuillez sélectionner un fichier de type png, gif ou jpg !';
 }
 else{
 if( file_exists($_FILES['photo']['tmp_name'])&& (filesize($_FILES['photo']
['tmp_name'])) > $taille_max){
 echo 'Votre fichier doit faire moins de 500Ko !';
 }
 else{
     $couverture = basename($_FILES['photo']['name']);
 // enlever les accents

$couverture=strtr($couverture,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAA
AAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
 // remplacer les caractères autres que lettres, chiffres et point par _
 $couverture = preg_replace('/([^.a-z0-9]+)/i', '_', $couverture);
 // copie du fichier
 move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier.$couverture);
 }
 }
 }
 }
    
 $Catalogue = new Catalogue($db);
 $exec = $Catalogue->insert($titre,$resume,$auteur,$couverture,$gerne);
 
 
 
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Veuillez vérifier les informations saisie ';
 }
 
 $form['titre'] = $titre;
 }
 echo $twig->render('gestioncatalogue.html.twig', array('form'=>$form,));
}



function actionCatalogue($twig,$db){
 $form = array();
 $Catalogue = new Catalogue($db);
 $liste = $Catalogue->select();
 $form['valide'] = true;
 
 

echo $twig->render('catalogue.html.twig', array('liste'=>$liste));
}

?>