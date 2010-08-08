<?php
//mảng $old được lấy từ => select MaDoChoi from dochoi ORDER BY MaDoChoi
$old = array("SP0000","SP0001","SP0002","SP0003","SP0004","SP0005","SP0006","SP0007","SP0008","SP0009","SP1010","SP0111","SP0116");
//Quy định chữ đầu của MaDoChoi; nếu csdl đầy có thể đổi sau
$maNew = "SP";
//đếm số tổng số sản phẩm = mysql_num_rows($result)
$n = count($old);
for($i=0;$i<$n;$i++){
    $t = substr($old[$i], 2);   
    if(intval($t) != $i){
        $num = $i;
        break;
    }
}
if(!isset ($num)){
    $num = $i;
}

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

//bi giờ ta đã có MaDoChoi ko "đụng hàng"
echo $maNew;
?>
