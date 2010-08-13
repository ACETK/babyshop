<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$Temp="";
$idxuly=$_GET['tentaikhoan'];
if ($_GET['action'] == 'delete') {
        $sql = "DELETE FROM nguoidung WHERE TenTaiKhoan='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNguoiDung');
}
if ($_GET['action'] == 'show') {
        $sql = "UPDATE nguoidung SET TinhTrang=0 WHERE MaNguoiDung='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNguoiDung');
}
if ($_GET['action'] == 'hide') {
        $sql = "UPDATE nguoidung SET TinhTrang=1  WHERE MaNguoiDung='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNguoiDung');
        ////////////////
}



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Xử lý người dùng");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
