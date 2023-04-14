
<?php
  require "../connexionBd/connexion.php";
  $sql=mysqli_query($conn,"SELECT * FROM direction ORDER BY Qté ASC");
?>

<!DOCTYPE html>
<html lang="fr" >
  <head>
    <meta charset="UTF-8">
    <title>Voir articles</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
     <h1>Liste des articles</h1>
      <table class="rwd-table">
        <tr>              
          <th>N°</th> 
          <th>Quantité</th>
          <th>Désignation</th>
          <th>P.U</th>
          <th>P.T</th>        
        </tr>
        <?php
          if(mysqli_num_rows($sql)!=0){$i = 0;
          while($test=mysqli_fetch_array($sql)){
          $i++; 
        ?>
        <tr>
          <td data-th="num"><?=$i?></td>
          <td data-th="Qté"><?=$test['Qté']?></td>         
          <td data-th="Désignation"><?php $test['Désignation'] = str_replace("*", "'",$test['Désignation'] );echo $test['Désignation'];?></td>           
          <td data-th="P.U"><?=$test['P.U']?></td>
          <td data-th="P.T"><?=$test['P.T']?></td>
          </tr>
        <tr>
      <?php }}?>
    </table>
  </body>
</html>
