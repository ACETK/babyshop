<?php

require_once 'Class/CDoChoi.php';

$IDMaDoChoi =$_GET['id'];
$sql = "SELECT * FROM DOCHOI where MaDoChoi='$IDMaDoChoi'";
$result = MySQLHelper::executeQuery($sql);

$sql1 = "SELECT SUM(SoLuong) AS SoLuongBan FROM cthdxuat WHERE MaDoChoi ='$IDMaDoChoi'";
$result1 = MySQLHelper::executeQuery($sql1);
$n = mysql_fetch_assoc($result1);
$SoLuongBan = $n['SoLuongBan'];
if($SoLuongBan == NULL) $SoLuongBan = 0;
echo $SoLuongBan;

$Temp="";
while($m = mysql_fetch_array($result)) {
            $dc = new CDoChoi();
            $dc->setMaDoChoi($m['MaDoChoi']);
            $dc->setTenDoChoi($m['TenDoChoi']);
            $dc->setMaLoai($m['MaLoai']);
            $dc->setMaNSX($m['MaNSX']);
            $dc->setDonGia($m['DonGia']);
            $dc->setThongTin($m['ThongTin']);
            $dc->setHinhAnh($m['HinhAnh']);
            $dc->setSoLuotXem($m['SoLuotXem']);
            $dc->SoLuongBan = $SoLuongBan;
            $Temp.= $dc->ViewDetail();
}
mysql_free_result($result);

//đưa dữ liệu vào content
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle','<div><a class="headerNavigation" href="index.php?action=productslist&idloai=' . $dc->getMaLoai() . '">Toys by Age</a> »' . $dc->getTenDoChoi() . '<br> <span class="smallText">Model: ' . $dc->getMaDoChoi() . '</span></div>');
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>