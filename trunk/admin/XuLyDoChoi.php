<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    $Temp="";
    $madcxoa = $_GET['iddochoi'];
    $sql1 = "SELECT MaLoai,TinhTrang FROM dochoi WHERE MaLoai ='$madcxoa'";
    $checkxoa = MySQLHelper::executeQuery($sql1);
    if (mysql_num_rows($checkxoa) == 0) {
        $truyvan = sprintf("UPDATE dochoi SET TinhTrang=%d WHERE MaDoChoi = '%s'",1,$madcxoa);
        $ketqua = MySQLHelper::executeQuery($truyvan);
        if($ketqua==1){
            header('location:admin.php?action=QuanLyDoChoi');
        }
        else{
            $Temp.="Xóa thất bại!";
        }
    }



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Xử lý đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
