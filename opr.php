<?php
if(!isset($_POST['nom'])) $nom='';
else $nom=$_POST['nom'];
if(!isset($_POST['prenom'])) $prenom='';
else $prenom=$_POST['prenom'];
if(!isset($_POST['email'])) $email='';
else $diplome=$_POST['email'];
if(!isset($_POST['telephone'])) $telephone='';
else $telephone=$_POST['telephone'];
if(!isset($_POST['op'])) $op='';
else $op=$_POST['op'];
if(!isset($_POST['id'])) $id='';
else $id=$_POST['id'];
if(!isset($_POST['cv'])) $cv='';
else $cv=$_POST['cv'];
if(!isset($_POST['lettre'])) $lettre='';
else $lettre=$_POST['lettre'];
 
///------------------------------------------------------------
require_once('cn.php');
switch ($op) {
case 0:
$content_dir = 'photo/'; // dossier où sera déplacé la photo de l'employe
 $tmp_file=$_FILES['cv']['tmp_name'];
 if(!is_uploaded_file($tmp_file) )
 {
 exit("Le fichier est introuvable");
 }


 $content_dir = 'photo/'; // dossier où sera déplacé la photo de l'employe
 $tmp_file1=$_FILES['lettre']['tmp_name'];
 if(!is_uploaded_file($tmp_file) )
 {
 exit("Le fichier est introuvable");
 }
 // on vérifie maintenant l'extension
 $type_file = $_FILES['cv']['type'];
  
//Veriffication du type du fichier en tenant compte de l'extension
 if(!strstr($type_file, 'png') && !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && 
!strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
 {
 exit("Le fichier n'est pas une image");
 }



 $type_file1 = $_FILES['lettre']['type'];
//Veriffication du type du fichier en tenant compte de l'extension
 if(!strstr($type_file1, 'png') && !strstr($type_file1, 'jpg') && !strstr($type_file1, 'jpeg') && 
!strstr($type_file1, 'bmp') && !strstr($type_file1, 'gif') && !strstr($type_file1, 'text') && !strstr($type_file1, 'pdf'))
 {
 exit("Le fichier n'est pas une image");
 }
 // on copie le fichier dans le dossier de destination
 $cv = $_FILES['cv']['name'];
 if( !move_uploaded_file($tmp_file, $content_dir .$cv) )
 {
 exit("Impossible de copier le fichier dans $content_dir");
 }

 $lettre = $_FILES['lettre']['name'];
 if( !move_uploaded_file($tmp_file1, $content_dir .$lettre))
 {
 exit("Impossible de copier le fichier dans $content_dir");
 }
 //echo "Le fichier a bien été uploadé";
//}*/
//----------------------------------------------------------------------
$req=$db->prepare('INSERT INTO offre(nom,prenom,email,telephone,cv,lettre) 
values(:nom,:prenom,:email,:telephone,:cv,:lettre)');
$req->execute(array(
 'nom'=>$nom,
'prenom'=>$prenom,
'email'=>$email,
'telephone'=>$telephone,
'cv'=>$cv,
'lettre'=>$lettre
));
header('location:actu.html');
break;
case 1:
$req=$db->prepare('UPDATE offre set nom=:nom,prenom=:prenom,email=:email,telephone=:telephone 
where id=:id');
$req->execute(array(
 'nom'=>$nom,
'prenom'=>$prenom,
'email'=>$email,
'telephone'=>$telephone,
'id'=>$id
));
header('location:actu.html');
break;
 
}//fin switch
?>

<?php 
if(!isset($_GET['id'])) $id='';
else $id=$_GET['id'];
if(!isset($_GET['ok'])) $ok='';
else $ok=$_GET['ok'];
require('cn.php');
$re=$db->query('SELECT * FROM offre');
if(isset($id)&& $ok==1){
$rup=$db->query("SELECT * FROM offre where id=$id");
$tab=$rup->fetch();
}
?>