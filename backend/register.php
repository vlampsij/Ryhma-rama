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

    
    <main class="form-signin w-100 m-auto  mb-3">
    <?php if($_SESSION['rooli'] != "isannoitsija"){ ?>
    <form method="POST" action="http://localhost/vlampsij.github.io/backend/lisaaTunnus.php">

          <h1 class="h3 mb-3 fw-normal">Luo tunnus</h1>
      
          <div class="form-floating ">
            <label for="tunnus">Tunnus</label>
            <input type="text" class="form-control mb-3" name="tunnus" placeholder="Tunnus" required>
            
          </div>
          <div class="form-floating ">
            <label for="salasana">Salasana</label>
            <input type="password" class="form-control" name="salasana" placeholder="Salasana" required>
            
          </div>

          <div class="form-floating ">
            <label for="salasana">rooli</label>
            <select class="form-control" name="rooliid" required>
                <option value="1">asukas</option>
                <option value="2">asiakas</option>
                <option value="3">isännöitsijä</option>
                <option value="4">työntekijä</option>
            </select>
            
          </div>

          <div class="form-floating ">
            <label for="nimi">Nimi</label>
            <input type="text" class="form-control mb-3" name="nimi" placeholder="Nimi">
            
          </div>
      

          <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Lisää</button>
          
        </form>
        <?php }else{echo "Et ole isännöitsijä"; ?>
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
