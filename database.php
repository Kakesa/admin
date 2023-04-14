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
    <title>base de bonnée</title>
</head>
    <body>
       <?php           
            class Database
            {
                private static $dbHost = "localhost";
                private static $dbName = "habillement";
                private static $dbUser = "root";
                private static $Password ="";
         

                private static $connection = null;

                 public static function connect()
                {
                    try 
                    {
                      $dbco = new PDO("mysql:host=" .$dbHost . ";dbname=" . $dbname,$dbUser,$Password);
                        
                    }
                    catch(PDOException $e)
                    {
                        die($e->getMessage());
                    }
                    return $connection;
                }
               public static function disconnect()
               {
                 $connection = null;
               }
            }     
        ?>
    </body>
</html>