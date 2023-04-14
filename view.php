<?php
  require 'connection.php';
  if(!empty($_GET['id']))
  {
     $id =checkInput($_GET['id']);
  } 

    $statement = $dbco->prepare('SELECT item.id, item.name, item.description, item.Prix, 
    item.image, (SELECT name FROM categorie WHERE id = item.categori) 
    AS categorie FROM item  WHERE item.id =?');
    $statement->execute([$id]);
    $item =  $statement->fetch();


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
    <body>
      <h1 class="text-logo" style="font-size:50px; color:darkorange;"><span class="bi bi-hand-thumbs-up-fill"></span> Page D'Administrateur<span class="bi bi-hand-thumbs-up-fill"></span></h1><br>
        <div class="container Admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Voir un item </strong></h1><br>
                    <form>
                        <div class="form-group">
                            <label>Nom : </label><?php echo ''. $item['name'];?>
                        </div>
                        <div class="form-group">
                            <label>Description : </label><?php echo '' . $item['description'];?>
                        </div>
                        <div class="form-group">
                            <label>Prix : </label><?php echo '' . number_format((float) $item['Prix'],2,'.','') . ' €';?>
                        </div>
                        <div class="form-group">
                            <label>Image : </label><?php echo '' . $item['image'];?>
                        </div>
                        <div class="form-group">
                            <label>Catégorie : </label><?php echo '' . $item['categorie'];?>
                        </div>
                    </form> 

                    <div class="form-actions">
                        <a href="index.php?" class="btn btn-primary"><span class="bi bi-arrow-left-short"></span>Retour</a>                    
                    </div>
                </div>

                <div class="col-sm-6 site">
                    <div class="thumbnail">
                       <img src="images/p9.png" alt="...">
                        <div class="prix"><?php echo number_format((float) $item['Prix'],2,'.','') . ' €';?></div>
                            <div class="caption">
                                <h4><?php echo  $item['name'];?></h4>
                                <p><?php echo  $item['description'];?></p>
                                <a class="btn btn-order" role="button" href="#"><span class="bi bi-cart-plus-fill"></span>Commander</a>
                            </div>
                    </div>
                </div>      
            </div>
        </div>
    </body>
</html>



