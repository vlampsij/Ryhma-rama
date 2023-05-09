<?php 
session_start();
require "conn.php"; 

if(isset($_POST['submit'])){
    if($_POST['tunnus'] == '' OR $_POST['salasana'] == ''){
        echo "tunnus tai salasana tyhjä";
    }else{
        echo "ok";
        $tunnus = $_POST['tunnus'];
        $salasana = $_POST['salasana'];

        $komento = "SELECT * FROM tunnukset WHERE tunnus = '$tunnus'";
        $login = $conn->query($komento);
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);



        //tsekkaa salasanan, hakee rooliid:n ja ohjaa asianmukaiselle sivulle
        if($login->rowCount() > 0){
            if($salasana == $data['salasana']){
                // password_verify($salasana, $data['salasana'])
                echo "ok";
                if($data['tunnusid'] == 1){
                    echo "tunnuksilla ei oikeuksia mihinkään";
                    header("location: login.php");
                }
                if($data['rooliid'] == 1){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] == "asukas";
                    header("location: uusiVika.php");
                }elseif($data['rooliid'] == 2){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] == "asiakas";
                    header("location: yhteydenotto.php");
                }elseif($data['rooliid'] == 3){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] == "isännöitsijä";
                    header("location: uusiVika.php");
                }elseif($data['rooliid'] == 4){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] == "työntekijä";
                    header("location: uusiVika.php");
                }else{
                    echo "tunnuksilla ei oikeuksia mihinkään";
                    header("location: login.php");
                }
            }else{
                echo "virheellinen tunnus tai salasana";
            }
        }else{
            echo "virheellinen tunnus tai salasana";
        }
    }

    
}
?>