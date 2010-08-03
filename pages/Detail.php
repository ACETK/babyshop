<?php

require_once 'Class/CDoChoi.php';

$IDMaDoChoi =$_GET['id'];
$sql = "SELECT* FROM DOCHOI where MaDoChoi='$IDMaDoChoi'";
$result = MySQLHelper::executeQuery($sql);

$sql1 = "SELECT TenLoai FROM DOCHOI dc JOIN LOAIDOCHOI ldc on dc.MaLoai=ldc.MaLoai";
$result1 = MySQLHelper::executeQuery($sql1);
$n = mysql_fetch_array($result1);
$tenloai = $n['TenLoai'];

$Temp="";
while($m = mysql_fetch_array($result)) {
            $dc = new CDoChoi();
            $dc->setMaDoChoi($m['MaDoChoi']);
            $dc->setTenDoChoi($m['TenDoChoi']);
            $dc->setMaLoai($m['MaLoai']);
            $dc->setDonGia($m['DonGia']);
            $dc->setThongTin($m['ThongTin']);
            $dc->setHinhAnh($m['HinhAnh']);
            $dc->TenLoai = $tenloai;
            $Temp.= $dc->ViewDetail();
}
//mysql_free_result($result);

//đưa dữ liệu vào content
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle','<div class="left_part"><a class="headerNavigation" href="index.php?action=Home">Home</a> » <a class="headerNavigation" href="index.php?action=productslist&idloai=' . $dc->getMaLoai() . '">Toys by Age</a> »' . $dc->getTenDoChoi() . '<br> <span class="smallText">Model: ' . $dc->getMaDoChoi() . '</span></div><div class="right_part"><span class="productSpecialPrice">' . $dc->getDonGia() . '</span></div>');
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>