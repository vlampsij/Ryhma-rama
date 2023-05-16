<?php session_start(); ?>
<!DOCTYPE html>
<html> <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--jQuery & JavaScript links-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!--<script src="js/myScript.js"></script>-->
    <link rel="stylesheet" href="../css/mycss.css">
    <title>Uusi vika</title>
    <!-- Fontin linkki -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
input{
        width: 70%;
        height: 40px;
       }
       
        </style>
</head>
    

    <body>
        <?php include '../header.html'; ?>

     <div class="container text-center">
        <br>
        <h1 class="text-center">Vikailmoitus</h1>
       
        <?php error_reporting(0);
        if(isset($_SESSION['tunnus']) AND $_SESSION['rooli'] == "asukas"){ ?>
         <?php echo '<a href="http://localhost/vlampsij.github.io/backend/index.php">Takaisin</a>' ?>

         <?php }else{ ?>
            <?php echo '<a href="http://localhost/vlampsij.github.io/backend/isannoitsija.php">Takaisin</a>'?>
        <?php }; ?>


        <?php error_reporting(0);
        if(isset($_SESSION['tunnus']) OR $_SESSION['rooli'] == "asukas" OR $_SESSION['rooli'] == "isännöitsijä"){ ?>
        <a href="http://localhost/vlampsij.github.io/backend/logout.php" >Kirjaudu ulos</a>
        <h3 class="mt-3 text-left">Lisää vika</h3>
        <table class="table-bordered mt-3 table text-left">
            <form action="lisaaVika.php" method="POST">
                <tr class="p-4">
                    <td>Vian kuvaus</td>
                    <td><input type="text" name="vika" required></td>
                </tr>
                <tr>
                    <td>Osoite</td>
                    <td><input type="text" name="osoite" required></td>
                </tr>
                <tr>
                    <td>Ilmoituksen tekijä</td>
                    <td><input type="text" name="tekija" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="talleta" type="submit" class="btn btn-primary" style="width:50%;font-size:25px;">Talleta</button></td>
                </tr>
            </form>
        </table>
        
        <?php }else{ ?>
            <p>Tunnuksella ei oikeuksia nähdä sivua</p>
        <?php } ?>
     </div>

     <?php include '../footer.html'; ?>
    </body>
</html>