<?php
//lấy dữ liệu cho combobox loại đồ chơi
$sql = "SELECT MaLoai,TenLoai FROM loaidochoi";
$result = MySQLHelper::executeQuery($sql);
$OptionLoai = '<option selected="" value="">Tất cả loại</option>';
while($row = mysql_fetch_assoc($result)){
    $OptionLoai .= '<option value="'.$row['MaLoai'].'">'.$row['TenLoai'].'</option>';
}

//lấy dữ liệu cho combobox nhà sản xuất
$sql = "SELECT MaNSX,TenNSX FROM nhasanxuat";
$result = MySQLHelper::executeQuery($sql);
$OptionNSX = '<option selected="" value="">Tất cả nhà sản xuất</option>';
while($row = mysql_fetch_assoc($result)){
    $OptionNSX .= '<option value="'.$row['MaNSX'].'">'.$row['TenNSX'].'</option>';
}

//đưa dữ liệu vào 2 combobox
$asearch = new XTemplate('./template/PageAdvancedSearch.html');
$asearch->assign('OptionLoai', $OptionLoai);
$asearch->assign('OptionNSX', $OptionNSX);
$asearch->parse('searchbox');

//đưa dữ liệu chính vào Content
$Temp = $asearch->text('searchbox');
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
//đưa dữ liệu vào content
$ctpl->assign('ContentTitle',"Tìm kiếm nâng cao");
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
