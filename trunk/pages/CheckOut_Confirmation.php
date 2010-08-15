<?php
$checkouttpl = new XTemplate('./template/CheckOut_Confirmation.html');

if(isset ($_POST['payment']) && isset ($_POST['loinhan'])){
    $_SESSION['CheckOut']['LoiNhan'] = $_POST['loinhan'];
    $_SESSION['CheckOut']['ThanhToan'] = $_POST['payment'];
}

if(isset ($_SESSION['CheckOut']['DiaChiNhan'])){
    $checkouttpl->assign('DiaChiNhan', $_SESSION['CheckOut']['DiaChiNhan']);
}else{
    $sql = "SELECT TenNguoiDung,DiaChi,DienThoai FROM nguoidung WHERE TenTaiKhoan = '{$_SESSION['TenTaiKhoan']}'";
    $result=  MySQLHelper::executeQuery($sql);
    $ThongTin = mysql_fetch_assoc($result);
    $checkouttpl->assign('DiaChiNhan', "{$ThongTin['TenNguoiDung']}<br/>{$ThongTin['DiaChi']}<br/>{$ThongTin['DienThoai']}");
}
$TongCong = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
    $sql = "SELECT TenDoChoi,DonGia,HinhAnh FROM dochoi WHERE MaDoChoi ='$id'";
    $result=MySQLHelper::executeQuery($sql);
    $dc = mysql_fetch_assoc($result);
    $ThanhTien = intval($dc['DonGia'])*$qty;
    $checkouttpl->assign('SL', $qty);
    $checkouttpl->assign('TenDoChoi', $dc['TenDoChoi']);
    $checkouttpl->assign('ThanhTien', number_format($ThanhTien).' VND');
    $checkouttpl->parse('main.giohang');
    $TongCong +=$ThanhTien;
}

$checkouttpl->assign('ThanhToan', $_SESSION['CheckOut']['ThanhToan']);
$checkouttpl->assign('TongCong', number_format($TongCong).' VND');
$checkouttpl->assign('LoiNhan', $_SESSION['CheckOut']['LoiNhan']);

$checkouttpl->parse('main');
$Temp = $checkouttpl->text('main');
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Xác nhận hóa đơn thanh toán");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
