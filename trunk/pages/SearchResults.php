<?php
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

////////////////////////////////
//Lấy dữ liệu, tạo câu truy vấn
$sql = "SELECT * FROM dochoi WHERE 1 ";
if (isset($_GET['MaLoai']) && $_GET['MaLoai'] != NULL)
    $sql .= ' AND MaLoai = ' . $_GET['MaLoai'];
if (isset($_GET['MaNSX']) && $_GET['MaNSX'] != NULL)
    $sql .= ' AND MaNSX = ' . $_GET['MaNSX'];
if (isset($_GET['tukhoa']) && $_GET['tukhoa'] != NULL) {
    if (isset($_GET['TimThongTin'])) {
        $sql .= " AND ThongTin LIKE '%" . $_GET['tukhoa'] . "%'";
    } else {
        $sql .= " AND TenDoChoi LIKE '%" . $_GET['tukhoa'] . "%'";
    }
}
if (isset($_GET['pfrom']) && isset($_GET['pto'])) {
    if ($_GET['pfrom'] != NULL && $_GET['pto'] != NULL) {
        $sql .= " AND DonGia BETWEEN " . $_GET['pfrom'] . " AND " . $_GET['pto'];
    } else if ($_GET['pfrom'] != NULL && $_GET['pto'] == NULL) {
        $sql .= " AND DonGia > " . $_GET['pfrom'];
    } else if ($_GET['pfrom'] == NULL && $_GET['pto'] != NULL) {
        $sql .= " AND DonGia < " . $_GET['pto'];
    }
}
if (isset($_GET['dfrom']) && isset($_GET['dto']) && ($_GET['dfrom']!="dd/mm/yyyy" || $_GET['dto']!="dd/mm/yyyy")) {
    $join = " dochoi dc JOIN hdnhap hdn ON dc.madochoi=hdn.madochoi ";
    $sql = str_replace("dochoi", $join, $sql);
    $dfrom = $_GET['dfrom'];
    $dto = $_GET['dto'];
    $dfrom = explode("/", $dfrom);
    $dfrom = $dfrom[2]."-".$dfrom[1]."-".$dfrom[0];
    $dto = explode("/", $dto);
    $dto = $dto[2]."-".$dto[1]."-".$dto[0];

    if ($dfrom != "yyyy-mm-dd" && $dto != "yyyy-mm-dd") {
        $sql .= " AND hdn.NgayNhap BETWEEN '$dfrom' AND '$dto'";
    } else if ($dfrom != "yyyy-mm-dd" && $dto == "yyyy-mm-dd") {
        $sql .= " AND hdn.NgayNhap > '$dfrom'";
    } else if ($dfrom == "yyyy-mm-dd" && $dto != "yyyy-mm-dd") {
        $sql .= " AND hdn.NgayNhap < '$dto'";
    }
    $sql.= " GROUP BY dc.madochoi ";
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
$result = MySQLHelper::executeQuery($sql." LIMIT $offset,$productsPerPage");
$dsach = new CDanhSachDoChoi();
while ($row = mysql_fetch_assoc($result)) {
    $DC = new CDoChoi();
    $DC->setMaDoChoi($row['MaDoChoi']);
    $DC->setMaLoai($row['MaLoai']);
    $DC->setMaNSX($row['MaNSX']);
    $DC->setTenDoChoi($row['TenDoChoi']);
    $DC->setThongTin($row['ThongTin']);
    $DC->setDonGia($row['DonGia']);
    $DC->setHinhAnh($row['HinhAnh']);
    $DC->setSoLuotXem($row['SoLuotXem']);
    $dsach->add($DC);
}

//đếm tổng số sản phẩm tìm được
$sql_numrows = str_replace('*', ' COUNT(*) AS NumRows ',$sql);
$sql_numrows = str_replace(' GROUP BY dc.madochoi ', '',$sql_numrows);
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
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle', 'Đã tìm được '.$numproducts.' kết quả liên quan');
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
//gắn thêm nút back vào cuối Content
$Content .= '<div style="padding: 0px 0px 4px;"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td align="left" class="main" style="padding-left: 15px;">
                        <a href="javascript:history.go(-1);"><img height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a>
                    </td>
                    <td align="right" class="main" style="padding-right: 15px;">
                        <a href="index.php?action=AdvancedSearch"><img height="19" border="0"title=" Back " alt="Back" src="template/images/english/button_advanced_search.gif"></a>
                    </td>
                </tr>
            </tbody></table>';
?>


