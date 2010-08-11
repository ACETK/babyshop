<?php

if(isset ($_GET['action'])){
    require_once '../Class/MySQLHelper.php';

    if($_GET['action']=='delete'){
        $MaLoai = $_POST['MaLoai'];
        $sql = "DELETE FROM loaidochoi WHERE MaLoai = $MaLoai LIMIT 1";
    }else if($_GET['action']=='update'){
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];
        $sql = "UPDATE loaidochoi SET TenLoai = '$TenLoai' WHERE MaLoai = $MaLoai LIMIT 1" ;
    }else if($_GET['action']=='insert'){
        $TenLoai = $_POST['TenLoai'];
        $sql = "INSERT INTO loaidochoi(TenLoai) VALUES('$TenLoai')" ;
    }
    MySQLHelper::executeQuery($sql);
    header('location:../index.php?action=QuanLyLoaiDoChoi');
}else{
    header('location:../index.php');
}
?>
