<?php
require "../connexionBd/connexion.php";
    if(isset($_GET['save']))
    {
if( !empty($_GET['Qté']) && !empty($_GET['Désignation']) && !empty($_GET['P.U']) && !empty($_GET['P.T']) && !empty($_GET['TOTAL']))
        {        
            $Qte= strip_tags($_GET['Qté']);
            $Designation= strip_tags ($_GET['Désignation']);       
            $Pu =   $_GET['PU'];
            $Pu=(integer)$Pu;
        
            $TOTAl=(integer)$TOTAL;

            $ve=mysqli_query($conn,"SELECT *  FROM Direction where Qté='$Qté'");
            if(mysqli_fetch_array($ve)){

                echo "<br>". "Ce code existe déjà saississez un autre";
            }
else{
    $req ="Insert into Direction (Qté,Désignation,P.U,P.T,TOTAL)
    VALUES('$Qté','$Désignation','$P.U', '$P.T','$TOTAL')";
    $yo =mysqli_query($conn,$req);
    echo "<br>"."Enregistrement réussi";
 
    mysqli_close($conn);
}

              
        }
        else
        {           
            echo "Certains champs sont vides";           
        }  }
        ?>

<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="bootstrapS.css">
        <style type="text/css">

            .form-control{
                width: 45%;
            }
            body
            {
            background: silver;
            }
            form
            {
                position: relative;
                left: 45px;
            }
            label
            {
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
        <form   method="get"    action="">
            <label>Quantité</label>  <input name="Qte" Type="text" class="form-control" required>
            <label>Désignation</label>  <textarea class="form-control" name="libelle" required></textarea>
            <label>P.U</label>  <input name="PU" Type="number" class="form-control" required>
            <label>P.T</label>  <input name="PT" Type="number" class="form-control" required>
            <label>TOTAL</label> <input name="TOTAL" Type="number" class="form-control" required>
            <input type="submit" value="Enregistrer" name="save" class="btn btn-primary">
        </form>
    </body>
</html>