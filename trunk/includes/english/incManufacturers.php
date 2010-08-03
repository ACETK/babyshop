<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
require_once 'Class/CNhaSanXuat.php';

$sql = "SELECT* FROM nhasanxuat";
$result = MySQLHelper::executeQuery($sql);


$Temp = '
    <script language="javascript">
  function ChuyenTrang()
	{
		var comboBox = document.getElementById("manufacturers_id");
		var str = comboBox.options[comboBox.selectedIndex].value;
		window.location = "index.php?action=productslist&idnsx="+str;
	}

</script>
   
    <form name="manufacturers" action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0">
        <tr><td><select id="manufacturers_id" onChange="ChuyenTrang()" size="1" class="select">
        <option value="\' or 1--" SELECTED>Chọn</option>';
while($row = mysql_fetch_array($result)) {
    $nsx = new CNhaSanXuat();
    $nsx->setMaNSX($row['MaNSX']);
    $nsx->setTenNSX($row['TenNSX']);
    $Temp.= $nsx->View();
}
$Temp.='    </select>
            </td></tr>
    </table>
</form>
';
//Kết thúc nghiệp vụ
/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
$btpl->assign('BoxTitle','Nhà sản xuất');
//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Manufacturers = $btpl->text('box');
/** Kết thúc box */
?>
