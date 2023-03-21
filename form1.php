<?php 
 $dsn = 'mysql:host=localhost;dbname=formulaire; port=15000; charset='Encodage';
 $pdo = new PDO($dsn, 'Nom serveur','Mot de passe');
 ?>
 <php?
 $formulaire= mysql_query (SELECT * FROM formulaire);
 ?>
 <php?
 while ($formulaire= mysql_fetch_array($formulaire))
 {echo ".$formulaire ['CodeVerification'].";}
 ?>
 