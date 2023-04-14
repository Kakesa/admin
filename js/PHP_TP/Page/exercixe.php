<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /*
    // tableau associatif 
    $prenom =array('hope','eli','taj');
    $age = array(
    'hope'=> 22,
    'eli'=> 21,
    'taj'=> 12);
    echo $prenom[2] . '<br>';
    echo $age ['taj']. '<br>';



     
    $tab = array(
        0 => 'chif 0',
        1 => 'chif 1',
        2 => 'chif 2',
        
    );
    // la fonction foreach nous a permi a afficher tout le donnée de notre tableau
    foreach($tab AS $clé=>$valeur){
        echo $clé.'|'.$valeur.'<br>';
    }

    // tableau a deux dimension 
    $membre = array(
    array('hope', 25, 'hopekakesa@gmail.com'),
    array('eli', 22, 'okosonzo@gmail.com'),
    array('doche', 21,'nsimbadoche@ggmail.com')
);
echo $membre[0][0].' à '.$membre[0][1].  ' Ans, son mail est : ' .$membre[0][2] .'<br>';

//utilisons maintainant une boucle pour nous permettre d'afficher tout dqns une liste déroulant

$membre = array(
    array('hope', 25, 'hopekakesa@gmail.com'),
    array('eli', 22, 'okosonzo@gmail.com'),
    array('doche', 21,'nsimbadoche@ggmail.com')
);
echo $membre[0][0].' à '.$membre[0][1].  ' Ans, son mail est : ' .$membre[0][2] .'<br>';
for($ligne = 0;$ligne<3; $ligne++){
    $membre_num = $ligne + 1;
    echo 'Membre numero' .$membre_num .'<br>';

    echo '<ul>';
    for($col = 0;$col<3; $col++){
        echo '<li>' .$membre[$ligne][$col]. '</li>';
        echo '</ul>';
    }
}

// function a deux argument 
function NomAge($prenom,$age){
    echo $prenom . ' a ' . $age . ' ans';
}
NomAge('hope',24);
 


    $age = 19;
    $prenom = 'espoir';
    if($age < 5){
        echo "Bonjour vous etes majeur!";
    }else{
        echo "bonjour " . $prenom . " vous etes mineur!";
    }

*/

  ?>

  <form action="oko.php" method="post" enctype="multipart/form-data">
    <p>
        Entrez votre nom :
        <input type="text" name="name" id="name"><br><br>
        Entrez votre adresse email : <input type="email" name="email" id="email"><br>
        Sexe : <input type="radio" name="sexe" valeur="F">F
        <input type="radio" name="sexe" value="M">Monsieur<br>
        Website : <input type="text" name="website" ><br><br>
        Commentaire : <textarea name="comment"  cols="40" rows="5" ></textarea><br>
        Selectionner image : <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Envoyer" name="submit">
    </p>
  </form>
</body>
</html>