<?php
$litpl = new XTemplate('./template/PageLogIn.html');
$litpl->assign('action', 'includes/english/XuLyDangNhap.php');
$litpl->parse('main');
$Temp = $litpl->text('main');


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Welcome, Vui lòng đăng nhập");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
