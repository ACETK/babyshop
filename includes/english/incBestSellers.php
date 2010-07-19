<?php
$bs = new XTemplate('./template/incInfoBox.html');
$bs->assign('BoxTitle','Best Sellers');

$Temp = '<ul class="bestsellers">
    <li class="bg_list2_un"><a href=""><b>1.&nbsp;&nbsp;</b><font>Product #001</font></a></li>
    <li class="bg_list2"><a href=""><b>2.&nbsp;&nbsp;</b><font>Product #002</font></a></li>
    <li class="bg_list2"><a href=""><b>3.&nbsp;&nbsp;</b><font>Product #004</font></a></li>
    <li class="bg_list2"><a href=""><b>4.&nbsp;&nbsp;</b><font>Product #005</font></a></li>
    <li class="bg_list2"><a href=""><b>5.&nbsp;&nbsp;</b><font>Product #006</font></a></li>
</ul>';

$bs->assign('TEXT', $Temp);
$bs->parse('box');
$BestSellers = $bs->text('box');
?>
