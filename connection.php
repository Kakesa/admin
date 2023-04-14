<?php
    $serveur ="localhost";
    $dbname ='habillement';
    $username ="root";
    $pass="";

    try   
    {
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$username,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Connecté à $dbname sur $serveur avec succès.";
    } 

    catch (PDOException $e) 
    {
        die('Erreur au niveau du serveur');
    }

?>