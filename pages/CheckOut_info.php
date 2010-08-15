<?php
//session_start();
if(isset ($_SESSION['isLogin'])){
    $checkouttpl = new XTemplate('./template/CheckOut_Info.html');
    if(isset ($_POST['nguoinhan']) && $_POST['nguoinhan']!=""){
        $_SESSION['CheckOut']['DiaChiNhan'] = "{$_POST['nguoinhan']}<br/>{$_POST['diachi']}<br/>{$_POST['dienthoai']}";
    }

    if(isset ($_SESSION['CheckOut']['DiaChiNhan'])){
        $checkouttpl->assign('DiaChiNhan', $_SESSION['CheckOut']['DiaChiNhan']);
    }else{
        $sql = "SELECT TenNguoiDung,DiaChi,DienThoai FROM nguoidung WHERE TenTaiKhoan = '{$_SESSION['TenTaiKhoan']}'";
        $result=  MySQLHelper::executeQuery($sql);
        $ThongTin = mysql_fetch_assoc($result);
        $checkouttpl->assign('DiaChiNhan', "{$ThongTin['TenNguoiDung']}<br/>{$ThongTin['DiaChi']}<br/>{$ThongTin['DienThoai']}");
    }

    if(isset ($_GET['doidiachi'])){
        $checkouttpl->assign('FormAction', 'index.php?action=CheckOutInfo');
        $checkouttpl->parse('main.diachicu');
        $checkouttpl->parse('main.doidiachi');
    }else{
        $checkouttpl->assign('FormAction', 'index.php?action=CheckOutConfirmation');
        $checkouttpl->parse('main.kiemtradiachi');
        $checkouttpl->parse('main.thanhtoan');
        if(isset ($_SESSION['CheckOut']['LoiNhan']))
            $checkouttpl->assign('LoiNhan', $_SESSION['CheckOut']['LoiNhan']);
        $checkouttpl->parse('main.loinhan');
    }

    $checkouttpl->parse('main');
    $Temp = $checkouttpl->text('main');
    /** Khởi tạo content */
    $ctpl = new XTemplate('./template/incContentBox.html');
    $ctpl->assign('ContentTitle',"Thông tin thanh toán");
    //đưa dữ liệu vào content
    $ctpl->assign('ContentInfo', $Temp);
    $ctpl->parse('box');
    $Content = $ctpl->text('box');
    /** Kết thúc content */
}else{
    header('location:index.php?action=LogIn');
}
?>