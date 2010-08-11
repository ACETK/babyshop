<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$Temp='';
$iddochoixoa=$_POST['iddochoi'];
    $xoa ="DELETE FROM dochoi WHERE MaDoChoi = '$iddochoixoa'";
    $x = MySQLHelper::executeQuery($xoa);
   echo $x;
    if($x==true){
        $Temp.= 'Xóa đồ chơi thành công';
        header( "refresh:3; url=index.php?action=QuanLyDoChoi" );

    }else{
        $Temp.="Xóa thất bại";
    }
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi - Xóa đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
