<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"What's New Here?");
//Khởi tạo giao diện danh sách sản phẩm
$plist = new XTemplate("./template/incProductsList.html");
$plist->assign('ProductName', $PName);
$plist->assign('ProductImgURL', $PImgURL);
$plist->assign('ProductImgAlt', $PName);
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = "";
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>