<?php
require "conn.php";

if(isset($_POST['submit'])){
        $tunnus = $_POST['tunnus'];
        $salasana = $_POST['salasana'];
        $rooliid = $_POST['rooliid'];
        $nimi = $_POST['nimi'];

        $komento = "INSERT INTO tunnukset(tunnus, salasana, rooliid, nimi) VALUES (:tunnus, :salasana, :rooliid, :nimi)";
        $lisaa = $conn->prepare($komento);
        $lisaa->execute([
            ':tunnus' => $tunnus,
            'salasana' => password_hash($salasana, PASSWORD_DEFAULT),
            'rooliid' => $rooliid,
            'nimi' => $nimi
        ]);
}

echo "Yhteydenottopyyntösi on vastaanotettu.";
sleep(2);
header("location: http://localhost/vlampsij.github.io/backend/register.php");

?>