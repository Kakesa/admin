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
                <h1><strong>liste des items </strong> <a href="insert.php" class="btn btn-success btn-lg"><span class="bi bi-plus-lg"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>image</th>
                            <th>Categorie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require 'connection.php';
                            $statement = $dbco->query('SELECT item.id, item.name, item.description, item.Prix, item.image, (SELECT name FROM categorie WHERE id = item.categori) AS categorie FROM item AS item');

                            while($item = $statement->fetch()) 
                            {
                                echo '<tr>';
                                echo '<td>' . $item['name'] . '</td>';
                                echo '<td>' . $item['description'] .'</td>';
                                echo '<td>' . number_format((float) $item['Prix'],2,'.','') .'</td>';
                                echo '<td>' . $item['image']  .'</td>';
                                echo '<td>' . $item['categorie'] . '</td>';
                                echo  '<td width="400">'; 
                                echo '<a href="view.php?id=' .$item['id'] .'" class="btn btn-default mr-2"><span class="bi bi-eye"></span> Voir</a>';
                                echo '<a href="modifier.php?id=' .$item['id'] .'" class="btn btn-primary mr-2"><span class="bi bi-pen"></span>  Modifier</a>';
                                echo '<a href="supprimer.php?id=' .$item['id'] .'" class="btn btn-danger"><span class="bi bi-trash"></span>  Supprimer</a>';
                                echo '</td>';
                                echo'</tr>';
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>