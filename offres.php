
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
/*$content_dir = 'photo/'; // dossier où sera déplacé la photo de l'employe
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

<html>
<HEAD>
    <style>
        body
        {
            background-color: #ffff;
        }
    </style>

	<!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Custom & Default Styles -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="style/style.css">

     <!-- Style CSS -->
		<link rel="stylesheet" href="boostrap/css/style.css">

     <!--son style-->
     
     <link rel="stylesheet" href="style/formulaire.css">
<title>Offre</title>
    
</HEAD>
<body>
<div id="wrapper">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 hidden-xs">
                        <nav class="topbar-menu">
                            <ul class="list-inline">
                            	<li>Suivez-nous </li>
                                <li><a href="https://www.facebook.com/profile.php?id=100080971531730" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/alhikma_ong/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="tel:+22789608219"><i class="fa fa-whatsapp"></i></a></li>
                             
                            </ul><!-- end list -->
                        </nav><!-- end menu -->
                    </div><!-- end col -->

                    <div class="col-md-6 col-sm-6">
                        <nav class="topbar-menu">
                            <ul class="list-inline text-right navbar-right">
                                <li><a href="tel:+22789608219">Appelez nous en cliquant ici!</a></li>
                            </ul><!-- end list -->
                        </nav><!-- end menu -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end topbar -->

		<header class="header site-header">
			<div class="container">
				<nav class="navbar navbar-default yamm">
				    <div class="container-fluid">
				        <div class="navbar-header">
				            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
							<a class="navbar-brand" href="index.html"><img src="upload/logo.png" alt="Linda"></a>
				        </div>
				        <div id="navbar" class="navbar-collapse collapse">
				            <ul class="nav navbar-nav navbar-right">
				                <li><a href="index.html">Accueil</a></li>
				               <li><a href="page-contact-alt.html">Contact</a></li>
							   <li><a href="Quisom.html">A propos</a></li>
                               <li><a href="im.html">Projets</a></li>
                               <li  class="active"><a href="formulaire.php">Inscription</a></li>
                               <li><a href="im.html">Actualités</a></li>
                               

                               
                            </ul>
				        </div><!--/.nav-collapse -->
				    </div><!--/.container-fluid -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->
     

     <form action="opr.php" method='POST' enctype="multipart/form-data">
    <fieldset>
        <legend>Depots du dossier en lignes</legend>
                
            <label>Nom</label> <input type="text" value="<?php if(isset($id)&& $ok==1){ echo $tab['nom'];}?>" 
            name='nom' class="formcontrol"   placeholder="Nom" required><br><br>
            <label>Prenom</label><input type="text" value="<?php
            if(isset($id)&&$ok==1){ echo $tab['prenom'];}?>" name='prenom' class="formcontrol"   placeholder="prenom" required><br><br>
            <label>Email</label><input type="email" value="<?php
            if(isset($id)&&$ok==1){ echo $tab['email'];}?>" name='email' class="formcontrol"   placeholder="Email" required>
            <br><br>
            <label>Telephone</label><input type="number" 
            value="<?php
            if(isset($id)&&$ok==1){
            echo $tab['tel'];}?>" 
            name='telephone' 
            class="form-control"  placeholder="telephone" required><br>
           <label>CV</label> <input type="file" 
            name="cv">
           <label>Lettre de motivation</label> <input type="file" 
            name="lettre">
            <br><br>
            <button class="btn btnprimary col-md-12"><span class="glyphicon glyphicon-ok"></span>&nbsp;<?php if($ok==1){echo 
            'Modifier';}else{echo 'Envoyer';} ?></button>
            <input type="hidden" 
            name="op" value="<?php if(isset($id)&&$ok==1){echo 1;}else{echo 0;}?>">
            <input type="hidden" 
            name="id" value="<?php 
            if(isset($id)&&$ok==1){
            echo $tab['codevac'];}?>">
    </fieldset>
</form>
    
		
<footer>
	<div class="container" >
		<div class="row text-light text-center py-4 justify-content-center">
			<a href="index.html"><img src="images/logo.png" alt=""></a>
				<p>CHDD AL-HIKMA Collectif des Humanitaires pour un Developpement Durable.</p>
					<ul class="social pt-3">
						<li><a href="https://www.facebook.com/profile.php?id=100080971531730" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/alhikma_ong/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
					 </ul>
					 <p><br><br> 2022- 2023 &copy;The <a href="index.html">ONG </a>CHDD AL-HIKMA</p>
		</div>
	</div>
</footer>
	<!-- End Footer -->

<!-- jQuery Files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/animate.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/custom.js"></script>
 
</body>
</html>