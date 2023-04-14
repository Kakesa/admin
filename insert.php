<?php
    require 'connection.php';
    $nameError = $descriptionError = $prixError =$imageError  = $categoriError = $name =$description=$prix=$image=$categori ="";
    if(isset($_POST["submit"])){
        if(!empty($_POST['name']) &&
          !empty($_POST['description']) &&
          !empty($_POST['prix']) &&
          !empty($_POST['categori']))
            
            $name = checkInput($_POST['name']);
            $description = checkInput($_POST['description']);
            $prix = checkInput($_POST['prix']);
            $categori = checkInput($_POST['categori']);
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

           
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false){
                      echo '<br>' . " l'image est  " . $check["mime"] . ".";
                      $uploadOk = 1;
          
                   }else {
                      echo "Veillez introduire une image !";
                      $uploadOk = 0;            
                   }
               }
          

            if(file_exists($target_file))
            {
                $imageError = 'Fichier oyo ezo exister déjà';
                $uploadOk = 0;
            }
            if($_FILES['fileToUpload']['size'] > 500000)
            {
                $imageError = 'fichier nayo ekoki koleka 500kb te';
                $uploadOK = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jepg" && $imageFileType != "gif"){
                echo "Désolé votre image doit correspondre au format suivant JPG,JEPG,PNG,GIF";
                $uploadOK = 0;
            }
            if($uploadOk == 0){
                echo "Désolé votre fichier n'a pas été télécharger";
            }
            
                if(!move_Uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
                {
                   echo "le fichier " . basename($_FILES["fileToUpload"]["name"]) . "a été bien télécharger";
                    $uploadOk = false;

                   $sql = "INSERT INTO  item (name, description,prix,image,categori) VALUES (?,?,?,?,?)";
                   $query = $dbco->prepare($sql);
                    $query->execute([$name,$description,$prix,$image,$categori]);
                    header('Location : index.php');
                }
            
 
     

     else 
        {
          echo "error";   
        }

        function checkInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }      
    
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/hope.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="bootstrap.js.map"></script>
        <script src="boostrap.min.js"></script>
        <script src="bootstrap-icons/bootstrap-icons.js"></script>
        <title>Administration</title>
    </head>
    <body style="background:white;">
      <h1 class="text-logo" style="font-size:50px; color:darkorange;"><span class="bi bi-hand-thumbs-up-fill"></span> Page D'Administrateur<span class="bi bi-hand-thumbs-up-fill"></span></h1><br>
        <div class="container Admin">
            <div class="row">
                <h1><strong>Ajouter un item </strong></h1><br>
                <form class="form" role="form" action="insert.php" method="post" entype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom : </label><input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                    <label for="description">Description : </label><input type="text" class="form-control" name="description" id="description" name="description" value="<?php echo $description;?>">
                       <span class="help-inline"><?php echo $descriptionError;?></span>
                    </div>
                    <div class="form-group">
                    <label for="prix">Prix : </label><input type="number" step="0.01" class="form-control" id="prix" name="prix" value="<?php echo $prix;?>">
                        <span class="help-inline"><?php echo $prixError;?></span>
                    </div>
                    <div class="form-group">
                      <label for="prix">Categorie :</label>
                        <select class="form-control" name="categori" id="categori">
                            <?php
                           
                            foreach($dbco->query('SELECT * FROM categorie') AS $data)
                            {
                                echo '<option value="'. $data[$id] . '">' . $data[$name] . '</option>';
                            }
                           
                            ?>
                        </select>
                        <span class="help-inline"><?php echo $categoriError;?></span>
                    </div>

                    <div class="form-group">
                        <label for="image"> Sélectionner une image :</label><input type="file" name="fileToUpload" id="fileToUpload">
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>             
                 
                    <div class="form-actions">
                        <input type="submit"   name="submit" value="Ajouter" style="border-radius:10PX; left:10PX;">
                    <a href="index.php?" class="btn btn-primary"><span class="bi bi-arrow-left-short"></span>Retour</a>                    
                    </div> 
                </form>                        
            </div>
        </div>
    </body>
</html>



