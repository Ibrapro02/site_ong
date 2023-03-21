<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=ong', 'root', '');
}catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>