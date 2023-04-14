<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice</title>
    <style>
        .hope{
            background-color:silver;
            width: 450px;
        }
    </style>
</head>
<body>
    <center>
    <div align="center" class="hope">
        <h3><font color=""><ul>Saisie Nouvelle Direction</ul></font></h3>
        <form method="post" action="Ajoute.php">
            <table>
                <tr>
                    <td>Code de la nouvelle direction</td>
                    <td><input type="text" name="codedir" size="2" required></td>
                </tr>
                <tr>
                    <td>Libellé de la direction</td>
                    <td><input type="text" name="libdir" size="25"  required></td>
                </tr>
                </tr>
                <tr>
                    <td>Spécialité de la direction</td>
                    <td><input type="text" name="specdir" size="25"  required></td>
                </tr>
                <tr>
                    <td>Date de création de la direction </td>
                    <td><input type="date" name="datcredir" size="10"  required></td>
                </tr>
                <tr>
                    <td>Nom du directeur</td>
                    <td><input type="text" name="nomdir" size="25"  required></td>                   
                </tr>
                <tr>
                    <td>Nombre d'agent affectés</td>
                    <td><input type="numeric" name="nombagdir" size="2"  required></td>
                </tr>
            </table><br>
            <input type="submit" name="Valider" value="Valider">
        </form>

    </div>
    </center>
</body>
</html>