<p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>
        
        <?php
            echo 'Prénom : '.$_POST["prenom"].'<br>';
            echo 'Email : ' .$_POST["mail"].'<br>';
            echo 'Age : ' .$_POST["age"].'<br>';
            echo 'Sexe : ' .$_POST["sexe"].'<br>';
            echo 'Pays : ' .$_POST["pays"].'<br>';
        ?>



<!-- connexion à la BDD -->

<?php
    $serveur = "localhost";
    $dbname = "cours";
    $user = "root";
    $pass = "root";
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On crée une table form
        $form = "CREATE TABLE form(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            prenom TEXT,
            mail TEXT,
            age INT,
            sexe TEXT,
            pays TEXT)";
        $dbco->exec($form);
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }


    // on insert les données

    $sth = $dbco->prepare("
    INSERT INTO form(prenom, mail, age, sexe, pays)
    VALUES(:prenom, :mail, :age, :sexe, :pays)");
$sth->bindParam(':prenom',$prenom);
$sth->bindParam(':mail',$mail);
$sth->bindParam(':age',$age);
$sth->bindParam(':sexe',$sexe);
$sth->bindParam(':pays',$pays);
$sth->execute();

 //On renvoie l'utilisateur vers la page de remerciement
 header("Location:form-merci.html");


}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
?>