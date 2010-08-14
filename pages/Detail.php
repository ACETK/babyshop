<?php

require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
if(isset ($_GET['id'])){
    $IDMaDoChoi =$_GET['id'];
}else{
    header('location:index.php');
}

$sql = "SELECT SUM(SoLuong) AS SoLuongBan FROM hdxuat WHERE MaDoChoi ='$IDMaDoChoi'";
$result = MySQLHelper::executeQuery($sql);
$n = mysql_fetch_assoc($result);
$SoLuongBan = $n['SoLuongBan'];
if($SoLuongBan == NULL) $SoLuongBan = 0;

$sql = "SELECT * FROM DOCHOI where MaDoChoi='$IDMaDoChoi'";
$result = MySQLHelper::executeQuery($sql);
$Temp="";
while($m = mysql_fetch_array($result)) {
            $dc = new CDoChoi();
            $dc->setMaDoChoi($m['MaDoChoi']);
            $dc->setTenDoChoi($m['TenDoChoi']);
            $dc->setMaLoai($m['MaLoai']);
            $dc->setMaNSX($m['MaNSX']);
            $dc->setDonGia($m['DonGia']);
            $dc->setThongTin($m['ThongTin']);
            $dc->setHinhAnh($m['HinhAnh']);
            $dc->setSoLuotXem($m['SoLuotXem']);
            $dc->SoLuongBan = $SoLuongBan;
            $dc->setNgayNhap($m['NgayNhap']);
            $Temp.= $dc->ViewDetail();
}
$SoLuotXem = $dc->getSoLuotXem();
$SoLuotXem +=1;
$sql = "UPDATE dochoi SET SoLuotXem = '{$SoLuotXem}' WHERE MaDoChoi = '$IDMaDoChoi' LIMIT 1 ;";
MySQLHelper::executeQuery($sql);
$sql = "SELECT TenLoai FROM loaidochoi WHERE MaLoai={$dc->getMaLoai()}";
$result= MySQLHelper::executeQuery($sql);
$loai = mysql_fetch_assoc($result);
$TieuDe = '<div><a class="headerNavigation" href="index.php?action=productslist&idloai='.$dc->getMaLoai().'">'.$loai['TenLoai'].'</a> » '.$dc->getTenDoChoi().'<br> <span class="smallText">Model: '.$dc->getMaDoChoi().'</span></div>';
mysql_free_result($result);

//đưa dữ liệu vào content detail
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',$TieuDe);
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
$Content.='<div style="padding: 10px 0 0;"></div>';
$ctpl->reset('box');
/////////////////////////////
//Bắt đầu danh sách sản phẩm liên quan
$sql = "SELECT * FROM dochoi WHERE MaLoai = {$dc->getMaLoai()} AND MaDoChoi <> '{$dc->getMaDoChoi()}' LIMIT 0,6";
$result = MySQLHelper::executeQuery($sql);
$dsach = new CDanhSachDoChoi();
$Temp='';
while ($m = mysql_fetch_array($result)) {
    $dc = new CDoChoi();
    $dc->setMaDoChoi($m['MaDoChoi']);
    $dc->setTenDoChoi($m['TenDoChoi']);
    $dc->setMaLoai($m['MaLoai']);
    $dc->setMaNSX($m['MaNSX']);
    $dc->setDonGia($m['DonGia']);
    $dc->setThongTin($m['ThongTin']);
    $dc->setHinhAnh($m['HinhAnh']);
    $dc->setSoLuotXem($m['SoLuotXem']);
    $dsach->add($dc);
}
$Temp .= $dsach->viewList();
$ctpl->assign('ContentTitle','Các sản phẩm cùng loại');
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content .= $ctpl->text('box');
?>