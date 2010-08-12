<?php

if(isset ($_GET['action'])){
    require_once '../Class/MySQLHelper.php';

    $MaLoai = $_POST['MaLoai'];
    if($_GET['action']=='delete'){
        $sql = "DELETE FROM loaidochoi WHERE MaLoai = $MaLoai LIMIT 1";
    }else if($_GET['action']=='hide'){
        $sql = "UPDATE loaidochoi SET TinhTrang = 1 WHERE MaLoai = $MaLoai LIMIT 1" ;
    }else if($_GET['action']=='show'){
        $sql = "UPDATE loaidochoi SET TinhTrang = 0 WHERE MaLoai = $MaLoai LIMIT 1" ;
    }else if($_GET['action']=='update'){
        $TenLoai = $_POST['TenLoai'];
        $sql = "UPDATE loaidochoi SET TenLoai = '$TenLoai' WHERE MaLoai = $MaLoai LIMIT 1" ;
    }else if($_GET['action']=='insert'){
        $TenLoai = $_POST['TenLoai'];
        $sql = "INSERT INTO loaidochoi(TenLoai) VALUES('$TenLoai')" ;
    }
    
    MySQLHelper::executeQuery($sql);
    header('location:../admin.php?page=QuanLyLoaiDoChoi');
}else{
    header('location:../index.php');
}
?>
