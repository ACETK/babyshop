<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../../Class/MySQLHelper.php';


//if(isset ($_POST['hoten']) && isset ($_POST['password']) && isset ($_POST['dob']) && isset ($_POST['gender']) && isset ($_POST['diachi']) && isset ($_POST['telephone']) && isset ($_POST['email_address'])  ) {
 if(isset ($_POST['Luu'])){
    $ht=$_POST['hoten'];
    $mk=$_POST['password'];
    $ns=$_POST['dob'];
    $gt=$_POST['gender'];
    $dc=$_POST['diachi'];
    $dt=$_POST['telephone'];
    $em=$_POST['email_address'];
    /////////////
    $thang2 = substr($ns,3,2);
    $ngay2 = substr($ns,0,2);
    $nam2 = substr($ns,6,4);
    ///////////////////////
    $ntn2 =  $nam2."-".$thang2."-".$ngay2;
}
///////////////////////////
$sql1 = sprintf("UPDATE nguoidung SET TenNguoiDung = '%s',MatKhau='%s',NgaySinh='%s',
    GioiTinh='%s',DiaChi='%s',DienThoai='%s',Email='%s' WHERE TenTaiKhoan = '%s'",$ht,$mk,$ntn2,$gt,$dc,$dt,$em,$bientam);
$kq = MySQLHelper::executeQuery($sql1);
if($kq==true){
     $Temp.="Cập nhập thông tin thành công";
}else
    {
         header("location:../index.php");
    }
//if(isset ($_POST['ok'])){
//    $user = $_POST['txtTaiKhoan'];
//    $pass = $_POST['txtMatKhau'];
//    $sql = "SELECT * FROM nguoidung WHERE TenTaiKhoan = '$user'";
//    $result = MySQLHelper::executeQuery($sql);
//    $row = mysql_fetch_array($result,MYSQL_ASSOC);
//    if ($row == true && $row["MatKhau"] == $pass) {
//        $_SESSION['isLogin'] = 1;
//        $_SESSION['TenTaiKhoan'] = $row['TenTaiKhoan'];
//        $_SESSION['MatKhau'] = $row['MatKhau'];
//    }
//    else {
//        $_SESSION['isLogin'] = 0;
//    }
//     header("location:../../index.php");
//    }
?>
