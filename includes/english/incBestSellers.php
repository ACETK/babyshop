<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp

$sql = "SELECT TenDoChoi
        FROM dochoi dc JOIN cthdxuat ct ON dc.MaDoChoi=ct.MaDoChoi
        ORDER BY SoLuong DESC,TenDoChoi";

$Temp = '<ul class="bestsellers">

    <li class="bg_list2"><a href=""><b>1.&nbsp;&nbsp;</b><font>Product #001</font></a></li>

</ul>';
    //Kết thúc nghiệp vụ


/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
//đưa dữ liệu vào box
$btpl->assign('BoxTitle','Best Sellers');
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$BestSellers = $btpl->text('box');
/** Kết thúc box */
?>
