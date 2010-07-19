<?php
/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
$btpl->assign('BoxTitle','Best Sellers');

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<ul class="bestsellers">
    <li class="bg_list2_un"><a href=""><b>1.&nbsp;&nbsp;</b><font>Product #001</font></a></li>
    <li class="bg_list2"><a href=""><b>2.&nbsp;&nbsp;</b><font>Product #002</font></a></li>
    <li class="bg_list2"><a href=""><b>3.&nbsp;&nbsp;</b><font>Product #004</font></a></li>
    <li class="bg_list2"><a href=""><b>4.&nbsp;&nbsp;</b><font>Product #005</font></a></li>
    <li class="bg_list2"><a href=""><b>5.&nbsp;&nbsp;</b><font>Product #006</font></a></li>
</ul>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$BestSellers = $btpl->text('box');
/** Kết thúc box */
?>
