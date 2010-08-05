<?php
$Temp="";
require_once 'Class/CNguoiDung.php';

//////lay du lieu tu trang tao tk///////////
 $DK = new CNguoiDung();
$tk=$_POST['taikhoan'];
$ht=$_POST['hoten'];
$mk=$_POST['password'];
$ns=$_POST['dob'];
$gt=$_POST['gender'];
$dc=$_POST['diachi'];
$dt=$_POST['telephone'];
$em=$_POST['email_address'];
//cat ngay sinh
$thang = substr($ns,3,2);
$ngay = substr($ns,0,2);
$nam = substr($ns,6,4);
$ntn = $nam."-".$thang."-". $ngay;
        $DK->setTenTaiKhoan($tk);
        $sql = sprintf("INSERT INTO nguoidung (TenTaiKhoan, TenNguoiDung, MatKhau,NgaySinh,GioiTinh,DiaChi,DienThoai,Email) VALUES ('%s', '%s','%s', '%s', '%s','%s','%s', '%s')",$tk,$ht,$mk,$ntn,$gt,$dc,$dt,$em);
        $result = MySQLHelper::executeQuery($sql);
        if($result==1){
            $Temp .= $DK->View();
        }


///////////////////////////



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Chúc mừng bạn đã trở thành thành viên");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>