<?php

require "conn.php";

if(isset($_GET['pyyntoid'])){
    $pyyntoid = $_GET['pyyntoid'];
    $kysely = "DELETE FROM yhteydenottopyynnot WHERE pyyntoid=:pyyntoid";
    $poista = $conn->prepare($kysely);
    $poista->bindValue(':pyyntoid', $pyyntoid, PDO::PARAM_INT);
    $poista->execute();
}

header("location:http://localhost/vlampsij.github.io/backend/yhteydenottopyynnot.php");
?>