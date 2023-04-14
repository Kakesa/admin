<?php
  //verification des valeurs 
  if(isset($_GET["submit"])){
    $numero = $_GET["numero"];
    $date = $_GET["date"];
    $client = $_GET["client"];
    $designation = $_GET["designation"];
    $quantite = $_GET["quantite"];
    $prix = $_GET["prix"];
    $montant = $_GET["montant"];
    echo "numero : " . $numero . "date : " . $date . "client : " . $client . "<br>";

    foreach($designation as $designation){
          echo "designation : " . $designation;
    }
    echo "<br>";
    foreach($quantite as $quantite){
        echo "quantite : " . $quantite;
    }
    echo "<br>";
    foreach($prix as $prix){
        echo "prix : " . $prix;
    }
    echo "<br>";
    foreach($montant as $montant){
        echo "montant : " . $montant;
    }
    echo "<br>";

  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
</head>
<body>
    <form action="" method="get">
        <div>
            <label for="numero">Numéro</label>
            <input type="numeric" name="numero" id="numero">
            <label for="date">date</label>
            <input type="date" name="date" id="date">
            <label for="client">Client</label>
            <select name="client" id="client">
                <option value="Vallier">Vallier</option>
                <option value="chalier">chalier</option>
                <option value="aufran">aufran</option>
                <option value="hope">hope</option>
                <option value="cornelius">cornelius</option>
            </select>
        </div>
        <div>
            <table border=1>
               <tr>
                <td>Désignation</td>
                <td>Quantité</td>
                <td>Prix</td>
                <td>montant</td>
               </tr>
               <tr>
                <td><input type="text" name="designation[]" id="designation1"></td>
                <td><input type="text" name="quantite[]" id="quantite1"></td>
                <td><input type="text" name="prix[]" id="prix1"></td>
                <td><input type="text" name="montant[]" id="montant1"></td>
               </tr>
               <tr>
                <td><input type="text" name="designation[]" id="Designation2"></td>
                <td><input type="text" name="quantite[]" class="element" id="quantite2"></td>
                <td><input type="text" name="prix[]" class="element" id="prix2"></td>
                <td><input type="text" name="montant[]" id="montant2"></td>
               </tr>
               <tr>
                <td><input type="text" name="designation[]" id="Designation3"></td>
                <td><input type="text" name="quantite[]" class="element" id="quantite3"></td>
                <td><input type="text" name="prix[]" class="element" id="prix1"></td>
                <td><input type="text" name="montant[]" id="montant3"></td>
               </tr>
               <tr>
                <td><input type="text" name="designation[]" id="Designation4"></td>
                <td><input type="text" name="quantite[]" class="element" id="quantite4"></td>
                <td><input type="text" name="prix[]" class="element" id="prix1"></td>
                <td><input type="text" name="montant[]" id="montant4"></td>
               </tr>
               <tr>
                <td><input type="text" name="designation[]" id="Designation5"></td>
                <td><input type="text" name="quantite[]" class="element" id="quantite5"></td>
                <td><input type="text" name="prix[]" class="element" id="prix1"></td>
                <td><input type="text" name="montant[]" id="montant5"></td>
               </tr>
               <tr>
                <td>montant</td>
                <td></td>
                <td></td>
                <td><input type="text" name="montantHT" id="montantHT"></td>
               </tr>
               <tr>
                <td>tva</td>
                <td></td>
                <td></td>
                <td><input type="text" name="tva" id="tva"></td>
               </tr>
               <tr>
                <td>TotalTTC</td>
                <td></td>
                <td></td>
                <td><input type="text" name="TotalTTC" id="TotalTTC"></td>
               </tr>
            </table>
        </div>
        <div>
            <br> <br>

            <input type="submit" name="submit" id="submitBtn" value="Envoyer">
        </div>
        
    </form>
    <script>
        
        let quantiteOne=document.getElementById("quantite1");
            var button = document.getElementById("submitBtn");
            button.addEventListener("click", function(event){
            event.preventDefault()
            console.log(quantiteOne)

        }

            )
        function produit(){
            //pour la recuperation de id en commencant par deux etc.
            var id=this.getAttribute("id");
            var numero=id.substring(id.length+1 ,id.length);
            var quantite1=document.getElementById("quantite1" + numero).value;
            var prix1=document.getElementById("prix1" + numero).value;
            var montant1=document.getElementById("montant1" + numero);
            var produit=quantite1 * prix1; //multiplie le nombre de quantite par le prix
            if(!isNaN(produit)) montant1.value=produit;
            var montantTotal=0;
            montant=document.getElementsByClassName("montant");
            for(var i=0; i<montant.length; i++){
                if(!isNaN(parseInt(montant[i].value)))montantTotal=montantTotal+parseInt(montant[i].value);
            }
            var montantHT=document.getElementById("montantHT");// montant hors tva
            montantHT.value=montantTotal;

            var tva=document.getElementById("tva"); 
            tva.value=montantTotal*10/100;//pour calculer pour la tva

            var montantTTC=document.getElementById("TotalTTC"); 
            montantTTC.value=montantTotal + montantTotal*10/100;
           
        }
        
        var elements=document.getElementsByClassName("element");
        for(var i=0;i<elements.length;i++){
            elements[i].addEventListener("change", produit, false);
            elements[i].addEventListener("change",produit,false);
        }
        
       
        
       
    </script>
</body>
</html>