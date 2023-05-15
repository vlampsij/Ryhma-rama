<?php session_start(); ?>


<!doctype html>
<html lang="en">
  <head>
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
    <title>Kiinteistöhuolto R. Autio Oy</title>
    <link href="../css/sign-in.css" rel="stylesheet">
    <style>
      table{
        margin-top: 1.5em;
        
      }    
      
       

    
      </style>
  </head>
  <body class="text-center">
  
    <div class="kuva logo">
        <a href="index.html"><img src="../img/logo.png" alt="Kiinteistöhuolto R. Autio Oy" id="logo" class="img-fluid"></a>
    </div>

    <nav class=" sticky-top navbar-expand-sm">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar"></div>
      <ul>
        <li class="nav-item"><a href="../index.html">Etusivu</a></li>
        <li class="nav-item"><a href="../yhteystiedot.html">Yhteystiedot</a></li>
        <li class="nav-item"><a href="../referenssit.html">Referenssit</a></li>
        <li class="nav-item"><a href="../ota_yhteytta.html">Ota yhteyttä</a></li>
        <li class="dropdown nav-item">
          <a href="http://localhost/vlampsij.github.io/backend/login.php">Kirjaudu</a>
        </li>
      </ul>
      
    </div>
    </nav>

    <a href="http://localhost/vlampsij.github.io/backend/isannoitsija.php">Takaisin</a>
    <main class="form-signin w-100 m-auto  mb-3">
        <div>
<?php if($_SESSION['rooli'] == "isannoitsija" OR $_SESSION['rooli'] == "tyontekija"){ ?>
      <br>
      <table class="table table-striped table-bordered">
      <tr>
         <th>Yhteydenottopyyntö ID</th>
         <th>Nimi</th>
         <th>Sähköposti</th>
         <th>Osoite</th>
         <th>Viesti</th>
      </tr>

        <?php
            include("yhteydenottoListaus.php");
            $json_data = file_get_contents("data.json");
            $pyynnot = json_decode($json_data, true);
            $maara = 0;

            if(count($pyynnot) != 0){
            foreach($pyynnot as $key){
                foreach($key as $pyynto){
                ?>
                    <tr>
                        <td><?php echo $pyynto['Pyyntoid']; ?></td>
                        <td><?php echo $pyynto['Nimi']; ?></td>
                        <td><?php echo $pyynto['Sposti']; ?></td>
                        <td><?php echo $pyynto['Osoite']; ?></td>
                        <td><?php echo $pyynto['Viesti']; ?></td>
                        <td><?php echo'<a href="poistaPyynto.php?pyyntoid='.$pyynto['Pyyntoid'].'" class="btn btn-primary">Poista</a>';?></td>
                    </tr>
                    <?php
                    $maara++;
                }
            }
            }
            echo "Yhteydenottopyyntöjen määrä: " . $maara;
        }?>
        
</div>


</main>

<div class="container">
        
        <table class="table-bordered mt-3 table ">
            <h3 class="mt-5">Lisää vika</h3>
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
                    <td><button name="talleta1" type="submit" class="btn btn-primary" style="width:100%;">Talleta</button></td>
                </tr>
            </form>
        </table>
        
     </div>
    
<!-- <div class="footer mt-5">
    <p>Kiinteistöhuolto R. Autio Oy</p>
    <p>Y-tunnus: 09876543-1</p>
    <p>kiinteistöhuolto@r.autio</p>
</div> -->
</body>
</html>

