<?php
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';

////////////////////
//Tạo biến phân trang
// số sản phẩm trên một trang
$productsPerPage = 2;
// mặc định hiển thị trang 1
$pageNum = 1;
// nếu có $_GET['page'] thì sử dụng nó làm trang hiển thị
if(isset($_REQUEST['page'])){
    $pageNum = $_REQUEST['page'];
}
// chỉ số của dữ liệu đầu tiên
$offset = ($pageNum - 1) * $productsPerPage;

$sql = "SELECT * FROM dochoi WHERE 1 ";
if (isset($_REQUEST['MaLoai']) && $_REQUEST['MaLoai'] != NULL)
    $sql .= ' AND MaLoai = ' . $_REQUEST['MaLoai'];
if (isset($_REQUEST['MaNSX']) && $_REQUEST['MaNSX'] != NULL)
    $sql .= ' AND MaNSX = ' . $_REQUEST['MaNSX'];
if (isset($_REQUEST['tukhoa']) && $_REQUEST['tukhoa'] != NULL) {
    if (isset($_REQUEST['TimThongTin'])) {
        $sql .= " AND ThongTin LIKE '%" . $_REQUEST['tukhoa'] . "%'";
    } else {
        $sql .= " AND TenDoChoi LIKE '%" . $_REQUEST['tukhoa'] . "%'";
    }
}
if (isset($_REQUEST['pfrom']) && isset($_REQUEST['pto'])) {
    if ($_REQUEST['pfrom'] != NULL && $_REQUEST['pto'] != NULL) {
        $sql .= " AND DonGia BETWEEN " . $_REQUEST['pfrom'] . " AND " . $_REQUEST['pto'];
    } else if ($_REQUEST['pfrom'] != NULL && $_REQUEST['pto'] == NULL) {
        $sql .= " AND DonGia > " . $_REQUEST['pfrom'];
    } else if ($_REQUEST['pfrom'] == NULL && $_REQUEST['pto'] != NULL) {
        $sql .= " AND DonGia < " . $_REQUEST['pto'];
    }
}

$sql .= " LIMIT $offset,$productsPerPage";
//echo $sql;

$result = MySQLHelper::executeQuery($sql);
$Temp = "";
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
mysql_free_result($result);

$sql_numrows = str_replace('*', ' COUNT(*) AS NumRows ',$sql);
$self = "index.php?action=KetQuaTimKiem";
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

$Temp .= $dsach->viewList();
//$Temp .= divPage($numrows, $pageNum, $div, $productsPerPage);

if($maxPage > 1)
$Temp.=  '<div class="result2_top"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
        <table cellspacing="0" cellpadding="0" border="0" class="result result_bottom_padd">
        <tbody><tr>
                <td align="right" class="result_right">Trang: &nbsp;'.$first .'&nbsp;'. $prev .'&nbsp;'. $nav .'&nbsp;'. $next .'&nbsp;'. $last.'</td>
            </tr>
        </tbody></table>
        <div class="result2_bottom"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>';
echo $_REQUEST['page'];
////////////////
//xử lý giao diện
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle', "Kết quả tìm kiếm");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
//gắn thêm nút back vào cuối Content
$Content .= '<div style="padding: 0px 0px 4px;"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"></div>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td align="right" class="main">
                        <a href="javascript:window.history.back(-1);"><img height="19" border="0" width="71" title=" Back " alt="Back" src="includes/english/images/buttons/button_back1.gif" style="width: 71px; height: 19px;"></a>
                    </td></tr>
            </tbody></table>';
/** Kết thúc content */
?>
