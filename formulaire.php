<?php
    /*foreach ($_POST as $key => $val) 
        ${$key}=$val;
    foreach ($_GET as $key => $val) 
        ${$key}=$val;
    $erreur="";
    if(isset($valider)){
        if(empty($nom)) $erreur="<li>Nom invalide </li>";
        if(empty($prenom)) $erreur="<li>Prenom invalid</li>";
        if(empty($profession)) $erreur="<li>Profession invalide</li>";
        if(empty($nationnalite)) $erreur="<li>Nationnalite invalide</li>";
        if(empty($email)) $erreur="<li>Email invalide</li>";
        if(empty($telephone)) $erreur="<li>Numero invalide</li>";


    }*/
    include "cnx.php";
    if(isset($_POST['submit'])){

         
        $nom = $_POST['nom'];
        $nom = filter_var($nom, FILTER_SANITIZE_STRING);
        $prenom = $_POST['prenom'];
        $prenom = filter_var($prenom, FILTER_SANITIZE_STRING); 
        $profession = $_POST['profession'];
        $profession = filter_var($profession, FILTER_SANITIZE_STRING);
        $nationnalite= $_POST['nationnalite'];
        $nationnalite = filter_var($nationnalite, FILTER_SANITIZE_STRING);
        
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $telephone = $_POST['telephone'];
        $telephone = filter_var($telephone, FILTER_SANITIZE_STRING);
        $region = $_POST['region'];
        $region = filter_var($region, FILTER_SANITIZE_STRING);
        $genre = $_POST["genre"];
         
       /* $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$rename;*/
     
        $select_client = $conn->prepare("SELECT * FROM client WHERE email = ?");
        $select_client->execute([$email]);
        
        if($select_client->rowCount() > 0){
           $message[] = 'email already taken!';
        }else{
            
              $insert_client = $conn->prepare("INSERT INTO client(nom,prenom, profession,nationnalite, email,telephone,region,genre) VALUES(?,?,?,?,?,?,?,?)");
              $insert_client->execute([$nom,$prenom, $profession,$nationnalite, $email, $telephone,$region,$genre]);
              $message[] = 'new client registered! please login now';
           
        }
     
     }


?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>formulaire</title>
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


</head>
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
<form action="" method="POST">
    <fieldset>
        <legend>Inscription</legend>
        <label for="">Nom</label><input type="text" name="nom" placeholder="votre nom "><br>
        <label for="">Prénom</label><input type="text" name="prenom" placeholder="votre prénom " ><br>
        <label for="">Profession</label><input type="text" name="profession" placeholder="votre profession " ><br>
        <label for="">Nationnalité</label><input type="text" name="nationnalite" placeholder="votre nationnalité"><br>
        <label for="">Email</label><input type="email" name="email" placeholder="votre email " ><br>
        <label for="">Télephone</label><input type="number" name="telephone" placeholder="votre numero "><br><br>
        <label for="">Region</label>
        <select name="region" id="region">
            <option value="Dosso">Dosso</option>
            <option value="Maradi">Maradi</option>
            <option value="Niamey">Niamey</option> 
        </select><br><br>
        <label  for="">Genre</label><input class="sex" type="radio" name="genre" value="H">Homme&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="genre" value="F" class="sex">Femme <br><br>
      
        <button type="reset" value="Effacer" style="background-color:#ed7b22;"> Supprimer</button><br><br>
        <button  type="submit" value="Envoyer"  name="submit" style=" background-color:#0e14b1;">Envoyer</button><br>
        <?php if(!empty($erreur)) { ?>
            <div id=3="erreur">
                <?=$erreur?>
            </div>
            <?php } ?>
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