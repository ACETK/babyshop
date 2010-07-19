<?php
/** Khởi tạo box */
$btpl = new XTemplate('template/incInfoBox.html');
$btpl->assign('BoxTitle', 'Categories');

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'includes/MySQLHelper.php';
$sql = "SELECT TenLoai FROM LOAIDOCHOI";
$result = MySQLHelper::executeQuery($sql);

$Temp ='<ul class="categories">';
while($row = mysql_fetch_row($result)){
    $Temp .='<li class="bg_list"><a href="" >'.$row[0].'</a></li>';
}
$Temp.='</ul>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Categories = $btpl->text('box');
/** Kết thúc box */
?>
