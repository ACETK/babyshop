<?php
$Temp="";
require_once 'Class/CNguoiDung.php';

////////////////////////////////
$bientam= $_SESSION['TenTaiKhoan'];
$sql = "SELECT * FROM nguoidung WHERE TenTaiKhoan = '$bientam'";
$result = MySQLHelper::executeQuery($sql);
$row = mysql_fetch_array($result);
$kq = mysql_num_rows($result);
$ht= $row['TenNguoiDung'];
$mk = $row['MatKhau'];
$ns = $row['NgaySinh'];
$gt = $row['GioiTinh'];
$dt = $row['DienThoai'];
$dc = $row['DiaChi'];
$email = $row['Email'];
//////////////////////xu li ngay thang
$thang = substr($ns,5,2);
$ngay = substr($ns,8,2);
$nam = substr($ns,0,4);
$ntn =  $ngay."/".$thang."/".$nam;

$DK = new CNguoiDung();
$DK->setTenNguoiDung($ht);
$DK->setGioiTinh($gt);
$DK->setNgaySinh($ntn);
$DK->setDienThoai($dt);
$DK->setDiaChi($dc);
$DK->setEmail($email);
if($kq==1){
    $Temp.= $DK->ViewThongTin();
}
///////////////////////////


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Thông tin cá nhân $tentk");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>