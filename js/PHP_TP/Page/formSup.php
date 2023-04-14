<?php 
    require "../connexionBd/connexion.php";

    if(isset($_POST['delete']))
    {
        if(!empty($_POST['code']) )
        {
            $code= htmlspecialchars($_POST['code']);
            $veri=mysqli_query($conn,"SELECT * FROM Direction where codeDir='$code'");
            if(mysqli_fetch_array($veri))
            {
                $sql=mysqli_query($conn,"DELETE from Direction where codeDir='$code'");
                echo "<br>"."Suppression réussi avec succès";
            }
            else
            {
             echo "<br>". "Cette information n'existe pas";
            }
                
        }
        else
        {
         echo "<br>". "Certains champs sont vide";
        }
    }
?>


<html >
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="bootstrapS.css">
        <style type="text/css">*
            .form-control
            {
                width: 45%;
            }
            body
            {
            background: silver;

            }
            label
            {
            color: #fff;	
            font-weight: 13PX;
            font-size: 18px;
            }
            .btn-primary
            {
                position: relative;
                left: 100px;
                bottom: -23px;
                width: 25%;
            }
            form
            {
            position: relative;
            left: 45px;
            }
        </style>
        <title>Supprimer</title>

    </head>
    <body> 
        <form   method="POST"    action="">               
        <label>Quantité</label>     <input name="Qté" Type="text" class="form-control" required>
        <label>Désignation</label>  <textarea class="form-control" name="libelle" required></textarea>
        <label>P.U</label>       <input name="P.U" Type="number" class="form-control" required>
        <label>P.T</label>     <input name="P.T" Type="number" class="form-control" required>
        <label>TOTAL</label>   <input name="TOTAL" Type="number" class="form-control" required>        
        <input type="submit" value="Supprimer"   name="delete"   class="btn btn-primary">
        </form>
    </body>
</html>

