<?php
require_once 'Class/CDoChoi.php';
require_once 'Class/CDanhSachDoChoi.php';
require_once 'Class/MySQLHelper.php';


$sql = "SELECT * FROM dochoi WHERE 1 ";
if (isset($_POST['MaLoai']) && $_POST['MaLoai'] != NULL)
    $sql .= ' AND MaLoai = ' . $_POST['MaLoai'];
if (isset($_POST['MaNSX']) && $_POST['MaNSX'] != NULL)
    $sql .= ' AND MaNSX = ' . $_POST['MaNSX'];
if (isset($_POST['tukhoa']) && $_POST['tukhoa'] != NULL) {
    if (isset($_POST['TimThongTin'])) {
        $sql .= " AND ThongTin LIKE '%" . $_POST['tukhoa'] . "%'";
    } else {
        $sql .= " AND TenDoChoi LIKE '%" . $_POST['tukhoa'] . "%'";
    }
}
if (isset($_POST['pfrom']) && isset($_POST['pto'])) {
    if ($_POST['pfrom'] != NULL && $_POST['pto'] != NULL) {
        $sql .= " AND DonGia BETWEEN " . $_POST['pfrom'] . " AND " . $_POST['pto'];
    } else if ($_POST['pfrom'] != NULL && $_POST['pto'] == NULL) {
        $sql .= " AND DonGia > " . $_POST['pfrom'];
    } else if ($_POST['pfrom'] == NULL && $_POST['pto'] != NULL) {
        $sql .= " AND DonGia < " . $_POST['pto'];
    }
}

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

$Temp .= $dsach->viewList();


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
