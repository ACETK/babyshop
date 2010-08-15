<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
if(isset ($_GET['do'])) {
    $do = $_GET['do'];
    switch($do) {
        case 'check_password_strength':
            $password = $_GET['pass'];
            $strength = 0;
            // it hon 6 ki tu (lowercase)
            if(preg_match("/([a-z]{0,6})/", $password)) {
                $strength++;
            }
            // nhieu hon 6 ki tu (lowercase)
            if(strlen($password) > 6) {
                $strength++;
            }
            // nhieu hon 6 ki tu va co (uppercase)
            if((preg_match("/([A-Z]+)/", $password))&& strlen($password) > 6) {
                $strength++;
            }
            // nhieu hon 6 ki tu va co so tu nhien
            if((preg_match("/([0-9]+)/", $password)) && strlen($password) > 6) {
                $strength++;
            }
            header('Content-Type: text/xml');
            header('Pragma: no-cache');
            echo '<?xml version="1.0" encoding="UTF-8"?>';
            echo '<result><![CDATA[';
            switch($strength) {
                case 1:
                    echo '<div style="width: 25%; background-color: red;" id="password_bar"></div>';
                    break;
                case 2:
                    echo '<div style="width: 50%; background-color: yellow;" id="password_bar"></div>';
                    break;
                case 3:
                    echo '<div style="width: 75%; background-color: green;" id="password_bar"></div>';
                    break;
                case 4:
                    echo '<div style="width: 100%; background-color: green;" id="password_bar"></div>';
                    break;
            }
            echo ']]>';
            echo '<![CDATA[';
            switch($strength) {
                case 1:
                    echo 'Độ mạnh:<font id="rating_font" style="color: red"> Rất Yếu</font>';
                    break;
                case 2:

                    echo 'Độ mạnh:<font id="rating_font" style="color: #FFCD06"> Yếu</font>';
                    break;
                case 3:
                    echo 'Độ mạnh:<font id="rating_font" style="color: green"> Mạnh</font>';
                    break;
                case 4:
                    echo 'Độ mạnh:<font id="rating_font" style="color: green"> Rất Mạnh</font>';
                    break;
            }
            echo ']]></result>';

            break;
        default:
            echo 'Error, invalid action';
            break;
    }
}
?>
