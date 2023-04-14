
    <?php
    $name =  "";
    $email =  "";
    $sexe =  "";
    $comment = "";
    $website= "";
  
    if($_SERVER["REQUEST_METHOD"] == "POST"){
         $name = test_input($_POST ["name"]);
         $email = test_input($_POST ["email"]);
         $sexe = test_input($_POST ["sexe"]);
         $website = test_input($_POST ["website"]);
         $comment = test_input($_POST ["comment"]);
    }
    echo $name;

     echo '<br>' . 'Votre email est :  ';
    echo  $email;
    echo '<br>' . 'vous etes un :  ';
    echo  $sexe;
    '<br>' ;
     function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     

     $target_dir = "upload/";
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

     // check l'image si cela existe 
     //actual image or fake image 

     if(isset($_POST["submit"])){
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false){
            echo '<br>' . " l'image est  " . $check["mime"] . ".";
            $uploadOk = 1;

         }else {
            echo "Veillez introduire une image !";
            $uploadOk = 0;            
         }
     }

     if(file_exists($target_file)){
        echo "Désolé cette image exite déjà.";
        $uploadOk = 0;
     }
     ?>
     </p>

    
     <p>clique <a href="exercixe.php">ici</a>  pour retaper votre prenom</p>
