<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_SESSION['isLogin']) && $_SESSION['LoaiTK']=="admin"){
$Temp="";
$idxuly=$_GET['id'];
if ($_GET['action'] == 'delete') {
        $sql = "DELETE FROM dochoi WHERE MaDoChoi='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyDoChoi');
}
if ($_GET['action'] == 'show') {
        $sql = "UPDATE dochoi SET TinhTrang=0 WHERE MaDoChoi='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyDoChoi');
}
if ($_GET['action'] == 'hide') {
        $sql = "UPDATE dochoi SET TinhTrang=1  WHERE MaDoChoi='$idxuly'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyDoChoi');
        ////////////////
}


}else{
       header("location:index.php");
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
