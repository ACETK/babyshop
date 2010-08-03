<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');


//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

if(isset ($_GET['idloai'])){
    $IDMaLoai = $_GET['idloai'];
    $sql = "SELECT* FROM dochoi where MaLoai=$IDMaLoai";
    $ctpl->assign('ContentTitle', "Danh sách đồ chơi");
}else if(isset ($_GET['idnsx'])){
     $IDNSX = $_GET['idnsx'];
    $sql = "SELECT* FROM dochoi where MaNSX=$IDNSX";
    $ctpl->assign('ContentTitle', "Danh sách theo nhà sản xuất");
}
$result = MySQLHelper::executeQuery($sql);
$Temp ="";
$dsach = new CDanhSachDoChoi();
while ($m = mysql_fetch_array($result)) {
    $dc = new CDoChoi();
    $dc->setMaDoChoi($m['MaDoChoi']);
    $dc->setTenDoChoi($m['TenDoChoi']);
    $dc->setMaLoai($m['MaLoai']);
    $dc->setDonGia($m['DonGia']);
    $dc->setThongTin($m['ThongTin']);
    $dc->setHinhAnh($m['HinhAnh']);
    $dc->setSoLuotXem($m['SoLuotXem']);
    $dsach->add($dc);
}
$Temp .= $dsach->viewList();
mysql_free_result($result);
/////////////////ngiep vu nsx;

    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>
