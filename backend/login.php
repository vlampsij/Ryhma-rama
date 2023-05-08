<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Kirjautuminen</title>
    </head>
    <body>

<main class="form-signin w-50 m-auto">
  <form action="credcheck.php" method="POST">
    <h1 class="h3 mt-5 fw-normal text-center">Kirjaudu</h1>

    <div class="form-floating">
      <label for="tunnus">Tunnus</label>
      <input type="text" class="form-control" id="tunnus" placeholder="tunnus">
    </div>
    <div class="form-floating">
      <label for="salasana">Salasana</label>
      <input type="password" class="form-control" id="salasana" placeholder="Salasana">

    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Kirjaudu</button>
  </form>
</main>
</body>
</html>