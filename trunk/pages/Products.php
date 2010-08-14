<?php

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

////////////////////////////////
//Lấy dữ liệu, tạo câu truy vấn
if(isset ($_GET['idloai'])){
    $IDMaLoai = $_GET['idloai'];
    $sql = "SELECT* FROM dochoi where MaLoai=$IDMaLoai";
    $sql_temp = "SELECT TenLoai FROM loaidochoi WHERE MaLoai=$IDMaLoai";
    $result= MySQLHelper::executeQuery($sql_temp);
    $loai = mysql_fetch_assoc($result);
    $TieuDe = "Danh sách theo loại: ".$loai['TenLoai'];
}else if(isset ($_GET['idnsx'])){
    $IDNSX = $_GET['idnsx'];
    $sql = "SELECT* FROM dochoi where MaNSX=$IDNSX";
    $sql_temp = "SELECT TenNSX FROM nhasanxuat WHERE MaNSX=$IDNSX";
    $result= MySQLHelper::executeQuery($sql_temp);
    $loai = mysql_fetch_assoc($result);
    $TieuDe = "Danh sách theo NSX: ".$loai['TenNSX'];
}else{
    header('location:index.php');
}

////////////////////
// Bắt đầu phân trang
// số sản phẩm trên một trang
$productsPerPage = 6;
// mặc định hiển thị trang 1
$pageNum = 1;
// nếu có $_GET['page'] thì sử dụng nó làm trang hiển thị
if(isset($_GET['page']))  $pageNum = $_GET['page'];
// chỉ số của dữ liệu đầu tiên
$offset = ($pageNum - 1) * $productsPerPage;

/////////////
//đổ dữ liệu vào class
$result = MySQLHelper::executeQuery($sql." LIMIT $offset, $productsPerPage");
$dsach = new CDanhSachDoChoi();
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

//đếm tổng số sản phẩm tìm được
$sql_numrows = str_replace('*', ' COUNT(*) AS NumRows ',$sql);
$result = MySQLHelper::executeQuery($sql_numrows);
$row = mysql_fetch_assoc($result);
$numproducts = $row['NumRows'];
mysql_free_result($result);
// tính tổng số trang sẽ hiển thị
$maxPage = ceil($numproducts/$productsPerPage);
//tạo đường dẫn cho link phân trang
$self = "index.php".str_replace($_SERVER['PHP_SELF'], '',$_SERVER['REQUEST_URI']);

//Bắt đầu tạo link phân trang
// biến giữ các link liên kết đến từng trang
$nav  = '';
for($page = 1; $page <= $maxPage; $page++){
   if ($page == $pageNum){
      $nav .= " $page &nbsp;"; // khong can tao link cho trang hien hanh
   }
   else{
      $nav .= " <a class=\"pageResults\" href=\"$self&page=$page\">$page</a> &nbsp;";
   }
}

// tạo liên kết đến trang: trước, sau, đầu, cuối
if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  = " <a class=\"pageResults\" href=\"$self&page=$page\">[Trước]</a> ";
   $first = " <a class=\"pageResults\" href=\"$self&page=1\">[Đầu]</a> ";
}else{
   $prev  = ''; // Đang ở trang đầu, ko cần liên kết đến trang trước
   $first = ''; //  và trang đầu
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next = " <a class=\"pageResults\" href=\"$self&page=$page\">[Tiếp]</a> ";
   $last = " <a class=\"pageResults\" href=\"$self&page=$maxPage\">[Cuối]</a> ";
}else{
   $next = ''; // Đang ở trang cuối, ko cần liên kết đến trang sau
   $last = ''; // va trang cuối
}

///////////////////////////////
//Hoàn tất, xuất dữ liệu
$Temp = "";
if($maxPage > 1)
    $Temp.='<div class="result2_top"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
            <table cellspacing="0" cellpadding="0" border="0" class="result result_bottom_padd">
            <tbody><tr>
                    <td align="right" class="result_right">Trang: &nbsp;'.$first .'&nbsp;'. $prev .'&nbsp;'. $nav .'&nbsp;'. $next .'&nbsp;'. $last.'</td>
                </tr>
            </tbody></table>
            <div class="result2_bottom"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>';
$Temp .= $dsach->viewList();
if($maxPage > 1)
    $Temp.='<div class="result2_top"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
            <table cellspacing="0" cellpadding="0" border="0" class="result result_bottom_padd">
            <tbody><tr>
                    <td align="right" class="result_right">Trang: &nbsp;'.$first .'&nbsp;'. $prev .'&nbsp;'. $nav .'&nbsp;'. $next .'&nbsp;'. $last.'</td>
                </tr>
            </tbody></table>
            <div class="result2_bottom"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>';

////////////////////////////////
//Đưa dữ liệu vào trang chính
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle', $TieuDe);
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>
