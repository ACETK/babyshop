<?php

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

$sql = "SELECT dc.MaDoChoi,MaLoai,TenDoChoi,ThongTin,DonGia,HinhAnh,NgayNhap,SoLuotXem
        FROM dochoi dc JOIN (SELECT ct.MaDoChoi,NgayNhap
                             FROM cthdnhap ct JOIN hdnhap hd on ct.SoHDN=hd.SoHDN 
                             ORDER BY NgayNhap DESC) t on dc.MaDoChoi=t.MaDoChoi
        GROUP BY dc.MaDoChoi
        ORDER BY NgayNhap DESC,TenDoChoi
        LIMIT 0,10";
$result = MySQLHelper::executeQuery($sql);

$Temp ="";
$dsach = new CDanhSachDoChoi();
while($row = mysql_fetch_assoc($result)){
    $DC = new CDoChoi();
    $DC->setMaDoChoi($row['MaDoChoi']);
    $DC->setMaLoai($row['MaLoai']);
    $DC->setTenDoChoi($row['TenDoChoi']);
    $DC->setThongTin($row['ThongTin']);
    $DC->setDonGia($row['DonGia']);
    $DC->setHinhAnh($row['HinhAnh']);
    $DC->setSoLuotXem($row['SoLuotXem']);
    $dsach->add($DC);
}
$Temp .= $dsach->viewList();
mysql_free_result($result);
    //Kết thúc nghiệp vụ


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Có gì mới hôm nay?");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>