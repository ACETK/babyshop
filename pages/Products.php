<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

////////////////////
//Tạo biến phân trang
// số sản phẩm trên một trang
$productsPerPage = 6;
// mặc định hiển thị trang 1
$pageNum = 1;
// nếu có $_GET['page'] thì sử dụng nó làm trang hiển thị
if(isset($_GET['page'])){
    $pageNum = $_GET['page'];
}
// chỉ số của dữ liệu đầu tiên
$offset = ($pageNum - 1) * $productsPerPage;

//////////////////
//sử lý dữ liệu xuất
if(isset ($_GET['idloai'])){
    $IDMaLoai = $_GET['idloai'];
    $sql = "SELECT* FROM dochoi where MaLoai=$IDMaLoai"." LIMIT $offset, $productsPerPage";
    $sql_numrows = "SELECT COUNT(*) AS NumRows FROM dochoi where MaLoai=$IDMaLoai";
    $self = "index.php?action=productslist&idloai=".$IDMaLoai;
    $ctpl->assign('ContentTitle', "Danh sách theo loại đồ chơi");
}else if(isset ($_GET['idnsx'])){
    $IDNSX = $_GET['idnsx'];
    $sql = "SELECT* FROM dochoi where MaNSX=$IDNSX"." LIMIT $offset, $productsPerPage";
    $sql_numrows = "SELECT COUNT(*) AS NumRows FROM dochoi where MaNSX=$IDNSX";
    $self = "index.php?action=productslist&idloai=".$IDNSX;
    $ctpl->assign('ContentTitle', "Danh sách theo nhà sản xuất");
}
$result = MySQLHelper::executeQuery($sql);
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
mysql_free_result($result);

//////////////////////////
//Tạo link liên kết trang
//
//Đếm số kết quả trả về trong csdl
$result = MySQLHelper::executeQuery($sql_numrows);
$row = mysql_fetch_assoc($result);
$numrows = $row['NumRows'];

// tính tổng số trang sẽ hiển thị
$maxPage = ceil($numrows/$productsPerPage);

// hiển thị liên kết đến từng trang
$nav  = '';

for($page = 1; $page <= $maxPage; $page++){
   if ($page == $pageNum){
      $nav .= " $page &nbsp;"; // khong can tao link cho trang hien hanh
   }
   else{
      $nav .= " <a class=\"pageResults\" href=\"$self&page=$page\">$page</a> &nbsp;";
   }
}

// tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  = " <a class=\"pageResults\" href=\"$self&page=$page\">[Trước]</a> ";

   $first = " <a class=\"pageResults\" href=\"$self&page=1\">[Đầu]</a> ";
}else{
   $prev  = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
   $first = '&nbsp;'; // va lien ket trang dau
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next = " <a class=\"pageResults\" href=\"$self&page=$page\">[Tiếp]</a> ";

   $last = " <a class=\"pageResults\" href=\"$self&page=$maxPage\">[Cuối]</a> ";
}else{
   $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
   $last = '&nbsp;'; // va lien ket trang cuoi
}

//////////////////
//Hiển thị kết wả
$Temp = "";
if($maxPage > 1)
$Temp ='<div class="result2_top"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
        <table cellspacing="0" cellpadding="0" border="0" class="result result_bottom_padd">
        <tbody><tr>
                <td align="right" class="result_right">Trang: &nbsp;'.$first .'&nbsp;'. $prev .'&nbsp;'. $nav .'&nbsp;'. $next .'&nbsp;'. $last.'</td>
            </tr>
        </tbody></table>
        <div class="result2_bottom"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>';;
$Temp .= $dsach->viewList();
if($maxPage > 1)
$Temp.=  '<div class="result2_top"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
        <table cellspacing="0" cellpadding="0" border="0" class="result result_bottom_padd">
        <tbody><tr>
                <td align="right" class="result_right">Trang: &nbsp;'.$first .'&nbsp;'. $prev .'&nbsp;'. $nav .'&nbsp;'. $next .'&nbsp;'. $last.'</td>
            </tr>
        </tbody></table>
        <div class="result2_bottom"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>';

    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>
