<?php 
    require "../connexionBd/connexion.php";
    //isset verifie si la variable existe
    if(isset($_POST['update']))
    {
        if(
            //empty verifie est vide 
            !empty($_POST['nom']) &&
            !empty($_POST['code']) &&
            !empty($_POST['libelle']) &&
            !empty($_POST['specialite']) &&
            !empty($_POST['dateCreation']) &&
            !empty($_POST['nbreAgent']))
        {
            $nom=  htmlspecialchars($_POST['nom']);
            $code= $_POST['code'];
            $libelle= htmlspecialchars($_POST['libelle']);
            $spe= htmlspecialchars($_POST['specialite']);
            $date=$_POST['dateCreation'];
            $nbreAgent= htmlspecialchars($_POST['nbreAgent']);
            $verify=mysqli_query($conn,"SELECT * from Direction where codeDir='$code'");
            $resultat = mysqli_num_rows($verify);
            if ($resultat==0)
            {
             echo "Aucune information dans la base de données";
            }
            else
            {
                if(mysqli_fetch_array($verify))
                {
                    $sql=mysqli_query($conn,"update Direction SET codeDir='$code',nomDirecteur='$nom',nbreAgent=$nbreAgent,libelle='$libelle',specialisation='$spe',dateCreation='$date' where codeDir='$code'");
                    echo "Modification réussi avec succès".$nom;
                }
                else
                {
                echo "Cette information n'existe pas";
                }               
            }
        }

        else
        {
         echo "Certains champs sont vide";
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
            background: silver;

            }
            label
            {

                color: #000;	
                font-weight: 13PX;
                font-size: 18px;
            }
            .btn-primary{
                position: relative;
                left: 100px;
                bottom: -23px;
                width: 25%;
            }
            form{

            position: relative;
            left: 45px;
            }
          /*
            fieldset{
            border : 1px solid #DF3F3F;
            margin: bottom 5px;
            padding: 0 20px 20px 20px;
            font-size:20px;
            }
            legend{
                color: #DF3F3F;
                font-weight:bold;
            }
        

            input[type=submit]{
                width: auto;
                margin: left 5px;
                box-shadow:1px 1px #D83F3D;
                cursor: pointer;
            }
            input{
                background-color: #FFF3F3;
            }
            */
        </style>
        <title> </title>
    </head>
    <body>      
        <form   method="POST"    action="">            
        <label>Quantité</label>   <input name="Qté" Type="text" class="form-control" required>
            <label>Désignation</label>  <textarea class="form-control" name="libelle" required></textarea>
            <label>P.U</label>     <input name="P.U" Type="number" class="form-control" required>
            <label>P.T</label>     <input name="P.T" Type="number" class="form-control" required>
            <label>TOTAL</label>    <input name="TOTAL" Type="number" class="form-control" required>
            <input type="submit" value="Modifier" name="update" class="btn btn-primary"><br><br><br>           
        </form>       
    </body>
</html>

