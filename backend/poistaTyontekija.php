<?php

require "conn.php";

if(isset($_GET['tyontekijaid'])){
    $tyontekijaid = $_GET['tyontekijaid'];
    $kysely = "DELETE FROM tyontekijat WHERE tyontekijaid=:tyontekijaid";
    $poista = $conn->prepare($kysely);
    $poista->bindValue(':tyontekijaid', $tyontekijaid, PDO::PARAM_INT);
    $poista->execute();
}

header("location:http://localhost/vlampsij.github.io/backend/tyontekijat.php");
?>