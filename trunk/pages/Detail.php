<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"What's New Here?");
require_once 'Class/CDoChoi.php';
///////////////////////


$IDMaDoChoi =$_GET['idmadochoi'];
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
            $dc->setMaNSX($m['MaNSX']);
            $dc->setSoLuong($m['SoLuong']);
            $dc->setDonGiaNhap($m['DonGiaNhap']);
            $dc->setDonGiaBan($m['DonGiaBan']);
            $dc->setThongTin($m['ThongTin']);
            $dc->setHinhAnh($m['HinhAnh']);
            $dc->TenLoai = $tenloai;
            $Temp.= $dc->ViewDetail();
}


//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>