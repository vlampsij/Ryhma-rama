<?php

header("Access-Control-Allow-Origin: *");

include('conn.php');

$kysely = "SELECT pyyntoid, nimi, sposti, osoite, viesti FROM yhteydenottopyynnot ORDER BY pyyntoid";
$data = $conn->query($kysely);

$JSON = '{"Yhteydenottopyyntö":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    //echo $rivi['etunimi'] . " " . $rivi['sukunimi'] . " " . $rivi['sposti'] . " " . $rivi['puh'] . "<br>";
    $laskuri++;
    $JSON.= '{"Pyyntoid":"'.$rivi['pyyntoid'].'","Nimi":"'.$rivi['nimi'].'","Sposti":"'.$rivi['sposti'].'","Osoite":"'.$rivi['osoite'].'","Viesti":"'.$rivi['viesti'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$conn = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>