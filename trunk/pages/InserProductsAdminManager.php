<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$Temp="";
$tendochoi= $_POST['tendochoi'];
$maloaidochoi=  $_POST['loaidochoi'];
$masanxuat =  $_POST['nhasanxuat'];
$thongtin = $_POST['thongtin'];
$tenfile =$_FILES['file_upload']['name'];
$cofile =$_FILES['file_upload']['size']/1024;
$loaifile =$_FILES['file_upload']['type'];
$choluufile =$_FILES['file_upload']['tmp_name'];
echo $tenfile;
echo "</br>";
echo $cofile;
echo "</br>";
echo $loaifile;
echo "</br>";
echo $choluufile;


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi - Thêm đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
