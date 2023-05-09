<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Vikailmoitus</title>
    </head>
    <body>
     <div class="container">
        <h1>Vikailmoitus</h1>
        <a href="index.php">Takaisin listaan</a>
        <a href="logout.php">Kirjaudu ulos</a>
        <?php if(!isset($_SESSION['rooli']) OR $_SESSION['rooli'] == "asukas" OR $_SESSION['rooli'] == "isännöitsijä"): ?>
        <h3>Lisää vika</h3>
        <table class="table-bordered">
            <form action="lisaaVika.php" method="POST">
                <tr>
                    <td>Vian kuvaus</td>
                    <td><input type="text" name="vika" required></td>
                </tr>
                <tr>
                    <td>Osoite</td>
                    <td><input type="text" name="osoite" required></td>
                </tr>
                <tr>
                    <td>Ilmoituksen tekijä</td>
                    <td><input type="text" name="tekija" readonly><?php echo $_SESSION['tunnus']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="talleta" type="submit" class="btn btn-primary">Talleta</button></td>
                </tr>
            </form>
        </table>
        <?php else: ?>
            <p>Ei oikeuksia</p>
        <?php endif; ?>
     </div>
    </body>
</html>