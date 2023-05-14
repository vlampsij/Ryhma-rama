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
        $tunnusid = $data['tunnusid'];



        //tsekkaa salasanan, hakee rooliid:n ja ohjaa asianmukaiselle sivulle
        if($login->rowCount() > 0){
            if(password_verify($salasana, $data['salasana'])){
                echo "ok";
                if($data['tunnusid'] == 1){
                    echo "tunnuksilla ei oikeuksia mihinkään";
                    header("location: http://localhost/vlampsij.github.io/backend/login.php");
                }
                if($data['rooliid'] == 1){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] = "asukas";
                    header("location: http://localhost/vlampsij.github.io/backend/uusiVika.php");
                }elseif($data['rooliid'] == 2){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] = "asiakas";
                    header("location: http://localhost/vlampsij.github.io/backend/yhteydenotto.php");
                }elseif($data['rooliid'] == 3){
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] = "isannoitsija";
                    header("location: http://localhost/vlampsij.github.io/backend/isannoitsija.php");
                }elseif($data['rooliid'] == 4){
                    $komento2 = "SELECT * FROM tyontekijat WHERE tunnusid = :tunnusid";
                    $login2 = $conn->prepare($komento2);
                    $login2->bindValue(':tunnusid', $tunnusid, PDO::PARAM_STR);
                    $login2->execute();
                    $ttdata = $login2->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['tyontekijaid'] = $ttdata['tyontekijaid'];
                    $_SESSION['tunnus'] = $data['tunnus'];
                    $_SESSION['tunnusid'] = $data['tunnusid'];
                    $_SESSION['rooli'] = "tyontekija";
                    header("location: http://localhost/vlampsij.github.io/backend/tyontekija.php");
                }else{
                    echo "tunnuksilla ei oikeuksia mihinkään";
                    header("location: http://localhost/vlampsij.github.io/backend/login.php");
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