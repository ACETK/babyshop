<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$sql = "SELECT dc.MaDoChoi,TenDoChoi,MaNSX,DonGia,hdx.SoLuong,HinhAnh
        FROM dochoi dc JOIN hdxuat hdx ON dc.MaDoChoi=hdx.MaDoChoi
        ORDER BY hdx.SoLuong DESC,TenDoChoi";
$result = MySQLHelper::executeQuery($sql);

$Temp = '<ul class="bestsellers">';
$num = 1;
while($row = mysql_fetch_assoc($result)){
    $sql = "SELECT TenNSX FROM nhasanxuat WHERE MaNSX={$row['MaNSX']}";
    $result_temp = MySQLHelper::executeQuery($sql);
    $nsx = mysql_fetch_assoc($result_temp);
    $GiaBan = number_format($row['DonGia'])." VND";
    $popup_message_dc = "<b>Mã đồ chơi:</b> {$row['MaDoChoi']}<br/><b>Nhà sản xuất:</b> {$nsx['TenNSX']}<br/><b>Đơn giá:</b> $GiaBan<br/><b>Số lượng bán:</b> {$row['SoLuong']}<br/><hr width=180px /><img src=images/sanpham/{$row['HinhAnh']} width=200px >";

    $Temp .= '<li class="bg_list2"><a href="index.php?action=detail&id='.$row['MaDoChoi'].'" onmouseover="popup(\''.$popup_message_dc.'\');" onmouseout="kill();"><b>'.$num++.'.&nbsp;&nbsp;</b><font>'.$row['TenDoChoi'].'</font></a></li>';
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
