<?php
print_r($_SESSION);
unset ($_SESSION['cart']);
unset ($_SESSION['CheckOut']);
$Temp = '';
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Hoàn tất thủ tục thanh toán");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
