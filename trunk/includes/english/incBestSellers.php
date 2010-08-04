<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$sql = "SELECT dc.MaDoChoi,TenDoChoi
        FROM dochoi dc JOIN cthdxuat ct ON dc.MaDoChoi=ct.MaDoChoi
        ORDER BY SoLuong DESC,TenDoChoi";
$result = MySQLHelper::executeQuery($sql);

$Temp = '<ul class="bestsellers">';
$num = 1;
while($row = mysql_fetch_assoc($result)){
    $Temp .= '<li class="bg_list2"><a href="index.php?action=detail&id='.$row['MaDoChoi'].'"><b>'.$num++.'.&nbsp;&nbsp;</b><font>'.$row['TenDoChoi'].'</font></a></li>';
}
$Temp .= '</ul>';
    //Kết thúc nghiệp vụ

/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
//đưa dữ liệu vào box
$btpl->assign('BoxTitle','Đồ chơi bán chạy nhất');
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$BestSellers = $btpl->text('box');
/** Kết thúc box */
?>
