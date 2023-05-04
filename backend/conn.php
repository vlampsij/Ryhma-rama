<?php
    header('Content-Type:text/html; charset=utf-8');

try{
    $host = "localhost";
    $dbname = "kiinteistohuolto";
    $user = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo $e->getMessage();
}
?>