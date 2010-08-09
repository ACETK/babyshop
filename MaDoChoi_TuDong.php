<?php

//require_once 'Class/MySQLHelper.php';
//
//$sql = "Select MaDoChoi From DoChoi ORDER BY MaDoChoi";
//$result = MySQLHelper::executeQuery($sql);
//$num = 0;
//while($row = mysql_fetch_assoc($result)){
//    $t = intval(substr($row['MaDoChoi'], 2));
//    if($t != $num){
//        break;
//    }
//    $num++;
//}

    $maNew = "SP";

    if(strlen($num)==1){
        $maNew .="000".$num;
    }else if(strlen($num)==2){
        $maNew .="00".$num;
    }else if(strlen($num)==3){
        $maNew .="0".$num;
    }else if(strlen($num)==4){
        $maNew .=$num;
    }else{
        $ThongBao = "Số lượng sản phẩm đã vượt wá mức lưu trữ"; //ghi cái này cho zui thôi ^ ^
    }
}
    echo $maNew;
?>
