<?php
  require "../connexionBd/connexion.php";
  $sql=mysqli_query($conn,"SELECT * FROM Direction ORDER BY codeDir ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hope.css">
    <title>FACTURE</title>
    <style>
        .oko{
  background-color: silver;
  width: 50%;
  height: 500px;
}
table
      {
        
        border-collapse:collapse;
        width:250px;
      }

      tr td 
      {
        border:1px solid black;
      }
      tr th{
        border:1px solid black;
      }
   
    </style>
</head>
<body>
    <center>
    <div class="oko">
        <div class="Nella">
             <p style="color: black;  float:left;  padding: 10px;">MAFRA LA DIFFERENCE <br><br>N°Impot A 1417288 H <br>Id.Nat : N 126690 <br>RCCM : 1397 P</p>
             <P style="color: black; float:right; margin: top 10px;left:-20%; padding: 10px;"><?php echo'Kin le :' .date('d-m-y');?></P> <br><br><br><br><br><br><br>
             <p style="color: black;  float:left;  padding: 10px;">Mr, Mme...........................................</p>
            <table class="rwd-table">
                <tr>              
                <th>N°</th> 
                <th>Quantité</th>
                <th>Désignation</th>
                <th>P.U</th>
                <th>P.T</th> 
                <th>TOTAL</th>        
                </tr>
                <?php
                if(mysqli_num_rows($sql)!=0){
                    $i =0;
                    while($test=mysqli_fetch_array($sql)){
                    $i++; 
                    ?>
                    <tr>
                    <td data-th="num"><?=$i?></td>
                    <td data-th="Qté"><?=$test['codeDir']?></td>         
                    <td data-th="Désignation"><?php $test['nomDirecteur'] = str_replace("*", "'",$test['nomDirecteur'] );echo $test['nomDirecteur'];?></td>           
                    <td data-th="P.U"><?=$test['nbreAgent']?></td>
                    <td data-th="P.T"><?=$test['specialisation']?></td>
                    </tr>
                    <tr>
                <?php }}?>
            </table>
        </div>
     </div>
    </center>
</body>
</html>
