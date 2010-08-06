<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$TKTAM = $_POST['taikhoan'];
$ETAM = $_POST['email'];
$sql = "SELECT MatKhau From nguoidung Where TenTaiKhoan='$TKTAM' And Email='$ETAM'";
$result = MySQLHelper::executeQuery($sql);
$kq = mysql_num_rows($result);
$m= mysql_fetch_array($result);
$mk= $m['MatKhau'];
 $Temp="";
if($kq==1)
{
    $mkm = $mk.""."123";
    $truyvan = sprintf("UPDATE nguoidung SET MatKhau='%s' WHERE TenTaiKhoan = '%s'",$mkm,$TKTAM);
    $ketqua = MySQLHelper::executeQuery($truyvan);
    if($ketqua==true)
        $Temp.="Mật khẩu của bạn là:<b>$mkm</b> ! Vui lòng đăng nhập và đổi lại mật khẩu";
}else{
    $Temp.="Tài khoản không tồn tại.Vui lòng đăng ký!";
}
/////////////
////////////////



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Thông tin quên mật khẩu");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>