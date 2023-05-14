<?php

header("Access-Control-Allow-Origin: *");

include('conn.php');

$kysely = "SELECT tyontekijaid, nimi, tila.tila FROM tyontekijat INNER JOIN tila ON tyontekijat.tilaid = tila.tilaid ORDER BY tyontekijaid";
$data = $conn->query($kysely);

$JSON = '{"ilmoitus":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    //echo $rivi['etunimi'] . " " . $rivi['sukunimi'] . " " . $rivi['sposti'] . " " . $rivi['puh'] . "<br>";
    $laskuri++;
    $JSON.= '{"Tyontekijaid":"'.$rivi['tyontekijaid'].'","Nimi":"'.$rivi['nimi'].'","Tila":"'.$rivi['tila'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$conn = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>