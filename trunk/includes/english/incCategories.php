<?php
/** Khởi tạo box */
$btpl = new XTemplate('template/incInfoBox.html');
$btpl->assign('BoxTitle', 'Categories');

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp ='<ul class="categories">
    <li class="bg_list_un"><a href="">Toys on SALE</a></li>
    <li class="bg_list"><a href="" >Toys by Age-&gt;</a></li>
    <li class="bg_list"><a href="" >Animals &amp; Wildlife</a></li>
    <li class="bg_list"><a href="" >Arts, Crafts &amp; Music</a></li>
    <li class="bg_list"><a href="" >Bath Toys</a></li>
    <li class="bg_list"><a href="">Building Blocks</a></li>
    <li class="bg_list"><a href="">Classic &amp; Retro</a></li>
    <li class="bg_list"><a href="">Cool Vehicles</a></li>
    <li class="bg_list"><a href="">Games</a></li>
    <li class="bg_list"><a href="">Outdoor Toys</a></li>
</ul>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Categories = $btpl->text('box');
/** Kết thúc box */
?>
