<?php
  require "../connexionBd/connexion.php";
    if(isset($_POST['search']))
    {    
        if(!empty($_POST['code']))
        {            
            $cd =$_POST['code'];
            $sql=mysqli_query($conn,"SELECT * FROM Direction WHERE codeDir='$cd'");

            $resultat = mysqli_num_rows($sql);

            if ($resultat == 0)
            {
             echo "<br>". "Ce code n'existe pas";
            } 
            else 
            {
                $donnees = mysqli_fetch_array($sql);
                mysqli_close($conn);
            }
        }
        else
        {
            echo "<br>". "Aucune valeur saisie";
        }
    }
?>
<html >
    <head>
        <meta charset="UTF-8" />
            <link rel="stylesheet" type="text/css" href="bootstrapS.css">

        <style type="text/css">*

        .form-control{
            width: 45%;
        }
        body{
        background:silver;

        }
        form{

        position: relative;
        left: 45px;

        }
        label{

        color: #fff;	
        font-weight: 13PX;
        font-size: 18px;
        }
        .btn-primary{
            position: relative;
            left: 100px;
            bottom: -23px;
            width: 25%;
        }

    </style>
        <title> </title>
    </head>
    <body> 
        <form  method="POST"   action="">
        <label>Quantité</label>   <input name="Qté" Type="text" class="form-control" value="<?php if(isset($donnees)){echo $donnees['codeDir']; } ?>" required>
            <label>Désignation</label>  <textarea class="form-control" name="libelle" <?php if(isset($donnees)){echo $donnees['libelle'];}?> required></textarea>
            <label>P.U</label>     <input name="P.U" Type="number" class="form-control"  value="<?php if(isset($donnees)){   echo $donnees['nbreAgent'];}?>" required>
            <label>P.T</label>     <input name="P.T" Type="number" class="form-control"  value="<?php if(isset($donnees)){   echo $donnees['nbreAgent'];}?>" required>
            <label>TOTAL</label>    <input name="TOTAL" Type="number" class="form-control" value="<?php if(isset($donnees)){   echo $donnees['nbreAgent'];}?>" required>
            <input type="submit" value="Rechercher" name="search" class="btn btn-primary">
        </form>
    </body>
</html>


    