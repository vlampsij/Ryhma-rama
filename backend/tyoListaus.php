<?php

header("Access-Control-Allow-Origin: *");

include('conn.php');

$kysely = "SELECT vikaid, vika, osoite, tilanne, kirjausaika, vikailmoitukset.tyontekijaid, tyontekijat.nimi FROM vikailmoitukset INNER JOIN tyontekijat ON vikailmoitukset.tyontekijaid = tyontekijat.tyontekijaid ORDER BY tyontekijaid";
$data = $conn->query($kysely);

$JSON = '{"ilmoitus":[';
$laskuri = 0;
$riveja = $data->rowCount();
while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    //echo $rivi['etunimi'] . " " . $rivi['sukunimi'] . " " . $rivi['sposti'] . " " . $rivi['puh'] . "<br>";
    $laskuri++;
    $JSON.= '{"Vika":"'.$rivi['vika'].'","Vikaid":"'.$rivi['vikaid'].'","Osoite":"'.$rivi['osoite'].'","Tilanne":"'.$rivi['tilanne'].'","Tyontekija":"'.$rivi['nimi'].'","Tyontekijaid":"'.$rivi['tyontekijaid'].'","Kirjausaika":"'.$rivi['kirjausaika'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}

$JSON.=']}';
$conn = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>