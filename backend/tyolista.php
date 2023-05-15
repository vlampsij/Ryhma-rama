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

    <a href="http://localhost/vlampsij.github.io/backend/tyontekija.php">Takaisin</a>
    
    <main class="form-signin w-100 m-auto  mb-3" >
    <?php if($_SESSION['rooli'] == "tyontekija"){ ?>
      <table class="table table-striped ">
      <tr>
         <th>Vikaid</th>
         <th>Vika</th>
         <th>Osoite</th>
         <th>Status</th>
         <th>Tyontekija</th>
         <th>Kirjausaika</th>
      </tr>

            <?php
              include("tyoListaus.php");
              $json_data = file_get_contents("data.json");
              $viat = json_decode($json_data, true);
              $maara = 0;

              if(count($viat) != 0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    if($vika['Tilanne'] != "3"){
                    ?>
                        <tr>
                         <td><?php echo $vika['Vikaid']; ?></td>
                          <td><?php echo $vika['Vika']; ?></td>
                          <td><?php echo $vika['Osoite']; ?></td>
                          <td><?php echo $vika['Tilanne']; ?></td>
                          <td><?php echo $vika['Tyontekija']; ?></td>
                          <td><?php echo $vika['Kirjausaika']; ?></td>
                        </tr>
                        <?php
                        $maara++;
                    }
                  }
                }
              }
              echo "Avoimet vikailmoitukset: " . $maara;
            ?>       
            
    </table>
    <form method="POST" action="tilapaivitys.php">

          <h1 class="h3 mb-3 fw-normal">Tyontekijän tiedot</h1>
      
          <div class="form-floating ">
            <label for="tyontekijaid">Työntekijä ID</label>
            <input type="text" class="form-control mb-3" name="tyontekijaid" value="<?php echo $_SESSION['tyontekijaid']?>" readonly>
            
          </div>
          <div class="form-floating mt-2">
            <label for="vikaid">Vikaid</label>
            <select class="form-control" name="vikaid">
              <?php if($maara != 0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    if($vika['Tilanne'] != "3"){
                      ?>
                        <option value="<?php echo $vika['Vikaid']; ?>"><?php echo $vika['Vikaid']; ?></option>
                      <?php
                    }
                  }
                }
              } ?>
            </select>
            <select class="form-control mt-2" name="tilanne">
              <?php if($maara != 0){
                foreach($viat as $key){
                  foreach($key as $vika){
                      ?>
                        <option value="1">Avoin</option>
                        <option value="2">Työn alla</option>
                        <option value="3">Suljettu</option>
                      <?php
                  }
                }
              } ?>
            </select>
            
          </div>
          <div class="form-floating mt-2">
            <?php if($maara == 0){ ?>
            <label for="tilaid">tila</label>
              <select class="form-control" name="tilaid" readonly>
                  <option value="1">Vapaa</option>
              </select>
            <?php }else{ ?>
                <input class="form-control" value="Varattu" readonly>
                <input type="hidden" class="form-control" name="tilaid" value="2">
            <?php } ?>
            
          </div>

          <button name="submit" class="w-100 btn btn-lg btn-primary mt-2" type="submit">Muokkaa</button>
          
        </form>
        <?php }else{error_reporting(0); echo "Et ole työntekijä"; ?>
          <br><a href="http://localhost/vlampsij.github.io/backend/logout.php">Kirjaudu ulos</a>
        <?php } ?>
      </main>

    
<div class="footer mt-5">
    <p>Kiinteistöhuolto R. Autio Oy</p>
    <p>Y-tunnus: 09876543-1</p>
    <p>kiinteistöhuolto@r.autio</p>
</div>
</body>
</html>
