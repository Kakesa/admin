<?php
$ns='localhost';
$user='root';
$pass='';
$db="Organisation";

$conn=mysqli_connect($ns,$user,$pass,$db);

if($conn->connect_error){
 die('Erreur : ' .$conn->connect_error);
     }
else{
 echo 'Connexion réussie ';
}

?>