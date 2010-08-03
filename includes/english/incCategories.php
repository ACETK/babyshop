<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp

require_once 'Class/CLoaiDoChoi.php';


$sql = "SELECT* FROM loaidochoi";
$result = MySQLHelper::executeQuery($sql);

$Temp ='<ul class="categories">';
while($row = mysql_fetch_array($result)){
   
    $ldc = new CLoaiDoChoi();
    $ldc->setMaLoai($row['MaLoai']);
    $ldc->setTenLoai($row['TenLoai']);
    $Temp.= $ldc->View(1);
}
$Temp.='</ul>';
    //Kết thúc nghiệp vụ

/** Khởi tạo box */
$btpl = new XTemplate('template/incInfoBox.html');
$btpl->assign('BoxTitle', 'Loại đồ chơi');
//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Categories = $btpl->text('box');
/** Kết thúc box */

?>
