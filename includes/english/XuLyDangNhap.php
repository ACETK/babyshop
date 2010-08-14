<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
include_once '../../Class/MySQLHelper.php';

session_start();
if (isset($_POST['txtTaiKhoan'])) {
    $user = $_POST['txtTaiKhoan'];
    $pass = $_POST['txtMatKhau'];
    $sql = "SELECT * FROM nguoidung WHERE TenTaiKhoan = '$user'";
    $result = MySQLHelper::executeQuery($sql);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    if ($row == true && $row["MatKhau"] == $pass) {
        $_SESSION['isLogin'] = 1;
        $_SESSION['TenTaiKhoan'] = $row['TenTaiKhoan'];
        $_SESSION['LoaiTK'] = $row['MaLoai'];
        $_SESSION['MatKhau'] = $row['MatKhau'];
        if(isset ($_POST['ghinho'])){
             setcookie("username",$row['TenTaiKhoan'],time()+3600);
             setcookie("MaLoai",$row['MaLoai'],time()+3600);
             echo $_COOKIE['username'];
             echo $_COOKIE['MaLoai'];
         }
    } else {
        $_SESSION['isLogin'] = 0;
    }
    if($_SESSION['LoaiTK']=="admin") {
        header("location:../../admin.php");
    } else {
       header("location:../../index.php");
    }
}
?>
