<?php
require "conn.php";

if(isset($_POST['submit'])){


    // $komento2 = "SELECT * FROM vikailmoitukset WHERE vikaid = '$vikaid'";
    // $login = $conn->query($komento2);
    // $login->execute();
    // $data = $login->fetch(PDO::FETCH_ASSOC);

    if($_POST['tilaid'] == "1"){
        $tyontekijaid = $_POST['tyontekijaid'];
        $tilaid = $_POST['tilaid'];
        $komento3 = "UPDATE tyontekijat SET tilaid = :tilaid WHERE tyontekijaid = :tyontekijaid";
        $lisaa3 = $conn->prepare($komento3);
        $lisaa3->execute([
            ':tilaid' => $tilaid,
            ':tyontekijaid' => $tyontekijaid,
        ]);
    }
    if($_POST['tyontekijaid'] == 1){
        $vikaid = $_POST['vikaid'];
        $tilanne = $_POST['tilanne'];
        $tyontekijaid = $_POST['tyontekijaid'];
        $tilaid = $_POST['tilaid'];

        $komento = "UPDATE vikailmoitukset SET tilanne = :tilanne, tyontekijaid = :tyontekijaid WHERE vikaid = :vikaid";
        $lisaa = $conn->prepare($komento);
        $lisaa->execute([
            ':tilanne' => $tilanne,
            ':tyontekijaid' => $tyontekijaid,
            ':vikaid' => $vikaid,
        ]);

        $komento3 = "UPDATE tyontekijat SET tilaid = :tilaid WHERE tyontekijaid = :tyontekijaid";
        $lisaa3 = $conn->prepare($komento3);
        $lisaa3->execute([
            ':tilaid' => $tilaid,
            ':tyontekijaid' => $tyontekijaid,
        ]);
    }else{
        $vikaid = $_POST['vikaid'];
        $tilanne = $_POST['tilanne'];
        $tyontekijaid = $_POST['tyontekijaid'];
        $tilaid = $_POST['tilaid'];

        $komento = "UPDATE vikailmoitukset SET tilanne = :tilanne WHERE vikaid = :vikaid";
        $lisaa = $conn->prepare($komento);
        $lisaa->execute([
            ':tilanne' => $tilanne,
            ':vikaid' => $vikaid,
        ]);

        $komento3 = "UPDATE tyontekijat SET tilaid = :tilaid WHERE tyontekijaid = :tyontekijaid";
        $lisaa3 = $conn->prepare($komento3);
        $lisaa3->execute([
            ':tilaid' => $tilaid,
            ':tyontekijaid' => $tyontekijaid,
        ]);
    }

    
}

echo "Tila päivitetty.";
sleep(2);
header("location: http://localhost/vlampsij.github.io/backend/tyolista.php");

?>