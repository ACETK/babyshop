<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset ($_GET['do'])){
    $do = $_GET['do'];
    echo $do;
    switch($do) {
        case 'check_password_strength':
            $password = $_GET['matkhau'];
            $strength = 0;
            // it hon 6 ki tu (lowercase)
            if(preg_match("/([a-z]{1,8})/", $password)) {
                $strength++;
            }
            // nhieu hon 6 ki tu (lowercase)
            if(strlen($password) > 8) {
                $strength++;
            }
            // nhieu hon 8 ki tu va co (uppercase)
            if((preg_match("/([A-Z]+)/", $password))&& strlen($password) > 4) {
                $strength++;
            }
            // nhieu hon 8 ki tu va co so tu nhien
            if((preg_match("/([0-9]+)/", $password)) && strlen($password) > 4) {
                $strength++;
            }
            header('Content-Type: text/xml');
            header('Pragma: no-cache');
            $Temp="";
            $Temp. '<?xml version="1.0" encoding="UTF-8"';
            $Temp. '<result><![CDATA[';
            switch($strength) {
                case 1:
                    $Temp.= 'Quá yếu';
                    $Temp. '<div style="width: 25%" id="password_bar"></div>';
                     break;
                case 2:
                     $Temp. 'Yếu';
                    $Temp. '<div style="width: 50%" id="password_bar"></div>';
                     break;
                case 3:
                     $Temp. 'Mạnh';
                    $Temp. '<div style="width: 75%" id="password_bar"></div>';
                    break;
                case 4:
                     $Temp. 'Rất mạnh';
                    $Temp. '<div style="width: 100%" id="password_bar"></div>';
                break;
            }
            $Temp. ']]></result>';
                 break;
        default:
            $Temp. 'Error, invalid action';
        break;
    }
}
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Ajax");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
